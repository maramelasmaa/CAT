<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Rating;
use App\Models\Tutor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $course->load('center', 'tutor');
        $course->loadAvg('ratings', 'rating')->loadCount('ratings');

        if ($course->relationLoaded('center') && $course->center) {
            $course->center->loadAvg('ratings', 'rating')->loadCount('ratings');
        }

        if ($course->relationLoaded('tutor') && $course->tutor) {
            $course->tutor->loadAvg('ratings', 'rating')->loadCount('ratings');
        }

        $userId = auth('web')->id();
        $canRateCourse = Enrollment::query()
            ->where('user_id', $userId)
            ->where('course_id', $course->id)
            ->where('status', 'approved')
            ->exists();

        $userCourseRating = Rating::query()
            ->where('user_id', $userId)
            ->where('rateable_type', Course::class)
            ->where('rateable_id', $course->id)
            ->first();

        $userTutorRating = null;
        $canRateTutor = false;
        if ($course->tutor) {
            $userTutorRating = Rating::query()
                ->where('user_id', $userId)
                ->where('rateable_type', Tutor::class)
                ->where('rateable_id', $course->tutor->id)
                ->first();

            $canRateTutor = Enrollment::query()
                ->where('user_id', $userId)
                ->where('status', 'approved')
                ->whereHas('course', function ($q) use ($course) {
                    $q->where('tutor_id', $course->tutor_id);
                })
                ->exists();
        }

        return view('Student.courses.details', compact('course', 'canRateCourse', 'userCourseRating', 'userTutorRating', 'canRateTutor'));
    }
}

