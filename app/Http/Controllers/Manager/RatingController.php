<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Tutor;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $centerId = auth('manager')->user()->center_id;

        $search = trim((string) $request->query('q', ''));
        $type = (string) $request->query('type', 'all');

        $center = Center::withAvg('ratings', 'rating')
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->findOrFail($centerId);

        $courses = Course::withAvg('ratings', 'rating')
            ->where('center_id', $centerId)
            ->withCount('ratings')
            ->orderBy('title')
            ->get();

        $tutors = Tutor::withAvg('ratings', 'rating')
            ->where('center_id', $centerId)
            ->withCount('ratings')
            ->orderBy('name')
            ->get();

        $courseIds = $courses->pluck('id')->toArray();
        $tutorIds = $tutors->pluck('id')->toArray();

        // Map course/tutor titles for quick lookup in the Blade
        $courseTitleById = $courses->pluck('title', 'id');
        $tutorNameById = $tutors->pluck('name', 'id');

        $ratingsQuery = Rating::with('user')
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
            });

        if ($type === 'center') {
            $ratingsQuery->where('rateable_type', Center::class);
        } elseif ($type === 'course') {
            $ratingsQuery->where('rateable_type', Course::class);
        } elseif ($type === 'tutor') {
            $ratingsQuery->where('rateable_type', Tutor::class);
        }

        if ($search !== '') {
            $ratingsQuery->where(function ($q) use ($search, $centerId) {
                $q->where('comment', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHasMorph('rateable', [Center::class], function ($rateableQuery) use ($search, $centerId) {
                        $rateableQuery
                            ->whereKey($centerId)
                            ->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHasMorph('rateable', [Course::class], function ($rateableQuery) use ($search, $centerId) {
                        $rateableQuery
                            ->where('center_id', $centerId)
                            ->where('title', 'like', "%{$search}%");
                    })
                    ->orWhereHasMorph('rateable', [Tutor::class], function ($rateableQuery) use ($search, $centerId) {
                        $rateableQuery
                            ->where('center_id', $centerId)
                            ->where('name', 'like', "%{$search}%");
                    });

                if (is_numeric($search)) {
                    $q->orWhere('rating', (int) $search);
                }
            });
        }

        $ratings = $ratingsQuery
            ->latest()
            ->paginate(20)
            ->withQueryString();

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
