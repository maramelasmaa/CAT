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

        $courseIds = $courses->pluck('id');
        $tutorIds = $tutors->pluck('id');

        $centerRatings = Rating::query()
            ->with('user')
            ->where('rateable_type', Center::class)
            ->where('rateable_id', $centerId)
            ->latest()
            ->get();

        $courseRatings = Rating::query()
            ->with(['user'])
            ->where('rateable_type', Course::class)
            ->whereIn('rateable_id', $courseIds)
            ->latest()
            ->get();

        $tutorRatings = Rating::query()
            ->with(['user'])
            ->where('rateable_type', Tutor::class)
            ->whereIn('rateable_id', $tutorIds)
            ->latest()
            ->get();

        // Map course/tutor titles for quick lookup in the Blade
        $courseTitleById = $courses->pluck('title', 'id');
        $tutorNameById = $tutors->pluck('name', 'id');

        return view('Manager.ratings.index', compact(
            'center',
            'courses',
            'tutors',
            'centerRatings',
            'courseRatings',
            'tutorRatings',
            'courseTitleById',
            'tutorNameById'
        ));
    }
}
