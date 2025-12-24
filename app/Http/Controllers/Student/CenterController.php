<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Enrollment;
use App\Models\Rating;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::query()
            ->withCount('courses')
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('created_at')
            ->get();
        return view('Student.centers.index', compact('centers'));
    }

    public function search(Request $request)
    {
        $term = trim((string) $request->input('q', $request->input('name', '')));

        $query = Center::query()
            ->withCount('courses')
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('created_at');

        if ($term !== '') {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $centers = $query->get();

        return view('Student.centers.index', compact('centers'));
    }

    public function show(Center $center)
    {
        $center->loadAvg('ratings', 'rating')->loadCount('ratings');
        $center->load(['courses' => function ($q) {
            $q->with('tutor')
                ->withAvg('ratings', 'rating')
                ->withCount('ratings')
                ->orderByDesc('created_at');
        }]);

        $userCenterRating = Rating::query()
            ->where('user_id', auth('web')->id())
            ->where('rateable_type', Center::class)
            ->where('rateable_id', $center->id)
            ->first();

        $canRateCenter = Enrollment::query()
            ->where('user_id', auth('web')->id())
            ->where('status', 'approved')
            ->whereHas('course', function ($q) use ($center) {
                $q->where('center_id', $center->id);
            })
            ->exists();

        return view('Student.centers.details', compact('center', 'userCenterRating', 'canRateCenter'));
    }

    public function searchCourses(Center $center, Request $request)
    {
        $term = trim((string) $request->input('q', $request->input('title', '')));

        $center->loadAvg('ratings', 'rating')->loadCount('ratings');

        $coursesQuery = $center->courses()
            ->with('tutor')
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('created_at');

        if ($term !== '') {
            $coursesQuery->where('title', 'LIKE', '%' . $term . '%');
        }

        $center->setRelation('courses', $coursesQuery->get());

        $userCenterRating = Rating::query()
            ->where('user_id', auth('web')->id())
            ->where('rateable_type', Center::class)
            ->where('rateable_id', $center->id)
            ->first();

        $canRateCenter = Enrollment::query()
            ->where('user_id', auth('web')->id())
            ->where('status', 'approved')
            ->whereHas('course', function ($q) use ($center) {
                $q->where('center_id', $center->id);
            })
            ->exists();

        return view('Student.centers.details', compact('center', 'userCenterRating', 'canRateCenter'));
    }
}
