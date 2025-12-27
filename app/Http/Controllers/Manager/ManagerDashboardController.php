<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Center;
use App\Models\Tutor;
use App\Models\Enrollment;
use App\Models\Rating;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        $centerId = auth('manager')->user()->center_id;

        $coursesCount = Course::where('center_id', $centerId)->count();
        $tutorsCount  = Tutor::where('center_id', $centerId)->count();

        $pendingEnrollments = Enrollment::where('status', 'pending')
            ->whereHas('course', function ($q) use ($centerId) {
                $q->where('center_id', $centerId);
            })
            ->count();

        $approvedEnrollments = Enrollment::where('status', 'approved')
            ->whereHas('course', function ($q) use ($centerId) {
                $q->where('center_id', $centerId);
            })
            ->count();

        $topCoursesByEnrollment = Course::query()
            ->where('center_id', $centerId)
            ->withCount([
                'enrollments as approved_enrollments_count' => fn ($q) => $q->where('status', 'approved'),
                'enrollments as pending_enrollments_count' => fn ($q) => $q->where('status', 'pending'),
            ])
            ->orderByDesc('approved_enrollments_count')
            ->orderByDesc('pending_enrollments_count')
            ->take(5)
            ->get(['id', 'title', 'capacity', 'available_seats']);

        $latestNegativeFeedback = Rating::query()
            ->where('rating', '<=', 2)
            ->whereNotNull('comment')
            ->whereHasMorph('rateable', [Course::class, Tutor::class, Center::class], function ($q, $type) use ($centerId) {
                if ($type === Course::class) {
                    $q->where('center_id', $centerId);
                    return;
                }

                if ($type === Tutor::class) {
                    $q->where('center_id', $centerId);
                    return;
                }

                if ($type === Center::class) {
                    $q->whereKey($centerId);
                    return;
                }
            })
            ->with(['user', 'rateable'])
            ->latest()
            ->take(8)
            ->get();

        return view('Manager.dashboard', compact(
            'coursesCount',
            'tutorsCount',
            'pendingEnrollments',
            'approvedEnrollments',
            'topCoursesByEnrollment',
            'latestNegativeFeedback'
        ));
    }
}
