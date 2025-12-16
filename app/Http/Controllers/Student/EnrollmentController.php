<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // 1. Check seats
        if ($course->available_seats <= 0) {
            return back()->with('error', 'No available seats.');
        }

        // 2. Prevent duplicate enrollment
        $already = Enrollment::where('user_id', auth('web')->id())
            ->where('course_id', $course->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($already) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        // 3. Validate input
        $request->validate([
            'payment_type'  => 'required|in:on_campus,bank',
            'payment_proof' => 'required_if:payment_type,bank|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // 4. Prepare data
        $data = [
            'user_id'      => auth('web')->id(),
            'course_id'    => $course->id,
            'status'       => 'pending',
            'payment_type' => $request->payment_type,
        ];

        // 5. On-campus payment
        if ($request->payment_type === 'on_campus') {
            $data['reservation_expiry'] = Carbon::now()->addDays(3);
        }

        // 6. Bank transfer
        if ($request->payment_type === 'bank' && $request->hasFile('payment_proof')) {
            $data['payment_proof'] =
                $request->file('payment_proof')->store('payments', 'public');
        }

        // 7. Create enrollment
        Enrollment::create($data);

        // 8. Reserve seat
        $course->decrement('available_seats');

        return redirect()
            ->route('student.enrollments.index')
            ->with('success', 'Enrollment created. Waiting for confirmation.');
    }
}