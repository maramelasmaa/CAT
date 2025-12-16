<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $centerId = auth('manager')->user()->center_id;

        $courses = Course::with('tutor')
            ->where('center_id', $centerId)
            ->get();

        return view('Manager.courses.index', compact('courses'));
    }

    public function create()
    {
        $centerId = auth('manager')->user()->center_id;
        $tutors = Tutor::where('center_id', $centerId)->get();
        return view('Manager.courses.create', compact('tutors'));
    }

    public function store(CourseRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $input['image'] = $path;
        }

        $input['center_id'] = auth('manager')->user()->center_id;
        $input['available_seats'] = $input['capacity'];

        Course::create($input);

        return redirect()->route('manager.courses.index')
            ->with('success', 'تم إضافة الدورة بنجاح');
    }

    public function details(Course $course)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($course->center_id !== $centerId) {
            abort(403);
        }

        $course->load('tutor');

        return view('Manager.courses.details', compact('course'));
    }

    public function edit(Course $course)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($course->center_id !== $centerId) {
            abort(403);
        }

        $tutors = Tutor::where('center_id', $centerId)->get();

        return view('Manager.courses.edit', compact('course', 'tutors'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($course->center_id !== $centerId) {
            abort(403);
        }

        $input = $request->validated();

        if ($request->hasFile('image')) {
            if ($course->image) {
                $oldPath = preg_replace('#^/storage/#', '', parse_url($course->image, PHP_URL_PATH));
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('courses', 'public');
            $input['image'] = $path;
        } else {
            $input['image'] = $course->image;
        }

        $course->update($input);

        return redirect()->route('manager.courses.index')
            ->with('success', 'تم تعديل الدورة بنجاح');
    }

    public function destroy(Course $course)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($course->center_id !== $centerId) {
            abort(403);
        }

        if ($course->image) {
            $oldPath = preg_replace('#^/storage/#', '', parse_url($course->image, PHP_URL_PATH));
            Storage::disk('public')->delete($oldPath);
        }

        $course->delete();

        return redirect()->route('manager.courses.index')
            ->with('success', 'تم حذف الدورة بنجاح');
    }
}
