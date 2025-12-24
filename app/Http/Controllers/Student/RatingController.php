<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Rating;
use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function storeCourse(Request $request, Course $course): RedirectResponse
    {
        $userId = auth('web')->id();

        $isEnrolled = Enrollment::query()
            ->where('user_id', $userId)
            ->where('course_id', $course->id)
            ->where('status', 'approved')
            ->exists();

        if (!$isEnrolled) {
            return back()->with('error', 'يجب أن تكون مسجلاً في هذه الدورة (ومعتمدة) لتقييمها.');
        }

        $data = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => $userId,
                'rateable_type' => Course::class,
                'rateable_id' => $course->id,
            ],
            [
                'rating' => $data['rating'],
                'comment' => $data['comment'] ?? null,
            ]
        );

        return back()->with('success', 'تم حفظ تقييم الدورة.');
    }

    public function storeCenter(Request $request, Center $center): RedirectResponse
    {
        $userId = auth('web')->id();

        $isEnrolledInCenter = Enrollment::query()
            ->where('user_id', $userId)
            ->where('status', 'approved')
            ->whereHas('course', function ($q) use ($center) {
                $q->where('center_id', $center->id);
            })
            ->exists();

        if (!$isEnrolledInCenter) {
            return back()->with('error', 'يجب أن تكون مسجلاً (ومعتمد) في دورة داخل هذا المركز لتقييمه.');
        }

        $data = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => $userId,
                'rateable_type' => Center::class,
                'rateable_id' => $center->id,
            ],
            [
                'rating' => $data['rating'],
                'comment' => $data['comment'] ?? null,
            ]
        );

        return back()->with('success', 'تم حفظ تقييم المركز.');
    }

    public function storeTutor(Request $request, Tutor $tutor): RedirectResponse
    {
        $userId = auth('web')->id();

        $isEnrolledWithTutor = Enrollment::query()
            ->where('user_id', $userId)
            ->where('status', 'approved')
            ->whereHas('course', function ($q) use ($tutor) {
                $q->where('tutor_id', $tutor->id);
            })
            ->exists();

        if (!$isEnrolledWithTutor) {
            return back()->with('error', 'يجب أن تكون مسجلاً (ومعتمد) في دورة لدى هذا المدرب لتقييمه.');
        }

        $data = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => $userId,
                'rateable_type' => Tutor::class,
                'rateable_id' => $tutor->id,
            ],
            [
                'rating' => $data['rating'],
                'comment' => $data['comment'] ?? null,
            ]
        );

        return back()->with('success', 'تم حفظ تقييم المدرب.');
    }
}
