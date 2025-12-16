<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    /**
     * List pending enrollments for this manager's center
     */
    public function index()
    {
        $centerId = auth('manager')->user()->center_id;

        $enrollments = Enrollment::with(['user', 'course'])
            ->where('status', 'pending')
            ->whereHas('course', function ($q) use ($centerId) {
                $q->where('center_id', $centerId);
            })
            ->latest()
            ->get();

        return view('Manager.enrollments.index', compact('enrollments'));
    }

    /**
     * Approve enrollment
     */
    public function approve(Enrollment $enrollment)
    {
        $this->authorizeEnrollment($enrollment);

        $enrollment->update([
            'status' => 'approved',
        ]);

        return back()->with('success', 'Enrollment approved.');
    }

    /**
     * Decline enrollment
     */
    public function decline(Enrollment $enrollment)
    {
        $this->authorizeEnrollment($enrollment);

        $enrollment->update([
            'status' => 'rejected',
        ]);

        // Return seat
        $enrollment->course->increment('available_seats');

        return back()->with('success', 'Enrollment rejected.');
    }

    /**
     * Security check
     */
    private function authorizeEnrollment(Enrollment $enrollment)
    {
        if ($enrollment->course->center_id !== auth('manager')->user()->center_id) {
            abort(403);
        }
    }
}