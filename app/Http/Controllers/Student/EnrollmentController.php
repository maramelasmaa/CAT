<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EnrollmentController extends Controller
{
    /**
     * Show student's enrollments
     */
    public function index()
    {
        $enrollments = Enrollment::with('course.center')
            ->where('user_id', auth('web')->id())
            ->latest()
            ->get();

        return view('student.enrollments.index', compact('enrollments'));
    }

    /**
     * Store new enrollment (on-campus OR bank)
     */
    public function store(Request $request, Course $course)
    {
        // 1. Validate input
        $request->validate([
            'payment_type'  => 'required|in:on_campus,bank',
            'payment_proof' => 'required_if:payment_type,bank|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $paymentProofPath = null;
        if ($request->payment_type === 'bank' && $request->hasFile('payment_proof')) {
            $paymentProofPath = $request->file('payment_proof')->store('payments', 'public');
        }

        try {
            DB::transaction(function () use ($request, $course, $paymentProofPath) {
                // Lock course row to prevent seat race conditions
                $lockedCourse = Course::query()
                    ->whereKey($course->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($lockedCourse->available_seats <= 0) {
                    throw new \RuntimeException('No available seats.');
                }

                $already = Enrollment::query()
                    ->where('user_id', auth('web')->id())
                    ->where('course_id', $lockedCourse->id)
                    ->whereIn('status', ['pending', 'approved'])
                    ->exists();

                if ($already) {
                    throw new \RuntimeException('You are already enrolled in this course.');
                }

                $data = [
                    'user_id'      => auth('web')->id(),
                    'course_id'    => $lockedCourse->id,
                    'status'       => 'pending',
                    'payment_type' => $request->payment_type,
                ];

                if ($request->payment_type === 'on_campus') {
                    $data['reservation_expiry'] = Carbon::now()->addDays(3);
                }

                if ($request->payment_type === 'bank' && $paymentProofPath) {
                    $data['payment_proof'] = $paymentProofPath;
                }

                Enrollment::create($data);

                // Reserve seat
                $lockedCourse->decrement('available_seats');
            });
        } catch (\Throwable $e) {
            if ($paymentProofPath) {
                Storage::disk('public')->delete($paymentProofPath);
            }

            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('student.enrollments.index')
            ->with('success', 'Enrollment created. Waiting for confirmation.');
    }
}