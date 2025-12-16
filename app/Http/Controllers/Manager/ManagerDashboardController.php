<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tutor;
use App\Models\Enrollment;

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

        $coursesCapacity = Course::select('title', 'capacity', 'available_seats')
            ->where('center_id', $centerId)
            ->get();

        $latestBankEnrollments = Enrollment::with(['user', 'course'])
            ->where('payment_type', 'bank')
            ->where('status', 'pending')
            ->whereHas('course', function ($q) use ($centerId) {
                $q->where('center_id', $centerId);
            })
            ->latest()
            ->get();

        return view('Manager.dashboard', compact(
            'coursesCount',
            'tutorsCount',
            'pendingEnrollments',
            'approvedEnrollments',
            'coursesCapacity',
            'latestBankEnrollments'
        ));
    }
}
