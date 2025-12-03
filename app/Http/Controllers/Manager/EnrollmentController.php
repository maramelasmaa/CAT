<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Storage;

class EnrollmentController extends Controller
{
    public function index()
    {
        $centerId = auth('manager')->user()->center_id;

        $enrollments = Enrollment::with(['student', 'course'])
            ->whereHas('course', function ($q) use ($centerId) {
                $q->where('center_id', $centerId);
            })
            ->get();

        return view('Manager.enrollments.index', compact('enrollments'));
    }

    public function details(Enrollment $enrollment)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($enrollment->course->center_id !== $centerId) {
            abort(403);
        }

        $enrollment->load(['student', 'course']);

        return view('Manager.enrollments.details', compact('enrollment'));
    }

    public function approve(Enrollment $enrollment)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($enrollment->course->center_id !== $centerId) {
            abort(403);
        }

        $course = $enrollment->course;

        if ($course->available_seats > 0) {
            $course->available_seats -= 1;
            $course->save();
        }

        $enrollment->update([
            'status' => 'approved'
        ]);

        return redirect()->route('manager.enrollments.index')
            ->with('success', 'تم قبول التسجيل');
    }

    public function decline(Enrollment $enrollment)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($enrollment->course->center_id !== $centerId) {
            abort(403);
        }

        $enrollment->update([
            'status' => 'declined'
        ]);

        return redirect()->route('manager.enrollments.index')
            ->with('success', 'تم رفض التسجيل');
    }
}
