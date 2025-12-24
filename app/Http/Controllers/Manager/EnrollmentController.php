<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;

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

        DB::transaction(function () use ($enrollment) {
            $locked = Enrollment::query()->whereKey($enrollment->id)->lockForUpdate()->firstOrFail();

            // Idempotency: only pending can be approved
            if ($locked->status !== 'pending') {
                return;
            }

            // If on-campus reservation expired, mark expired and return seat
            if ($locked->payment_type === 'on_campus'
                && $locked->reservation_expiry
                && $locked->reservation_expiry->isPast()) {
                $locked->update(['status' => 'expired']);
                Course::query()->whereKey($locked->course_id)->increment('available_seats');
                return;
            }

            $locked->update(['status' => 'approved']);
        });

        return back()->with('success', 'Enrollment approved.');
    }

    /**
     * Decline enrollment
     */
    public function decline(Enrollment $enrollment)
    {
        $this->authorizeEnrollment($enrollment);

        DB::transaction(function () use ($enrollment) {
            $locked = Enrollment::query()->whereKey($enrollment->id)->lockForUpdate()->firstOrFail();

            // Idempotency: only pending reservations should return a seat
            if ($locked->status !== 'pending') {
                return;
            }

            $locked->update(['status' => 'rejected']);
            Course::query()->whereKey($locked->course_id)->increment('available_seats');
        });

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