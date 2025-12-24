<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Tutor;

class RatingController extends Controller
{
    public function index()
    {
        $centerId = auth('manager')->user()->center_id;

        $center = Center::query()
            ->whereKey($centerId)
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->firstOrFail();

        $courses = Course::query()
            ->where('center_id', $centerId)
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderBy('title')
            ->get();

        $tutors = Tutor::query()
            ->where('center_id', $centerId)
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderBy('name')
            ->get();

        $courseIds = $courses->pluck('id')->all();
        $tutorIds = $tutors->pluck('id')->all();

        // Map course/tutor titles for quick lookup in the Blade
        $courseTitleById = $courses->pluck('title', 'id');
        $tutorNameById = $tutors->pluck('name', 'id');

        $ratings = Rating::query()
            ->with('user')
            ->where(function ($q) use ($centerId, $courseIds, $tutorIds) {
                $q->where(function ($q) use ($centerId) {
                    $q->where('rateable_type', Center::class)
                        ->where('rateable_id', $centerId);
                })
                ->orWhere(function ($q) use ($courseIds) {
                    $q->where('rateable_type', Course::class)
                        ->whereIn('rateable_id', $courseIds);
                })
                ->orWhere(function ($q) use ($tutorIds) {
                    $q->where('rateable_type', Tutor::class)
                        ->whereIn('rateable_id', $tutorIds);
                });
            })
            ->latest()
            ->get();

        return view('Manager.ratings.index', compact(
            'center',
            'courses',
            'tutors',
            'ratings',
            'courseTitleById',
            'tutorNameById'
        ));
    }
}
