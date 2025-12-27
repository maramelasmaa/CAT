<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\TutorRequest;
use App\Models\Tutor;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function index()
    {
        $centerId = auth('manager')->user()->center_id;

        $tutors = Tutor::where('center_id', $centerId)->get();

        return view('Manager.tutors.index', compact('tutors'));
    }

    public function create()
    {
        return view('Manager.tutors.create');
    }

    public function store(TutorRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tutors', 'public');
            $input['image'] = $path;
        }

        $input['center_id'] = auth('manager')->user()->center_id;

        Tutor::create($input);

        return redirect()->route('manager.tutors.index')
            ->with('success', 'تم إضافة المدرّس بنجاح');
    }

    public function details(Tutor $tutor)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($tutor->center_id !== $centerId) {
            abort(403);
        }

        return view('Manager.tutors.details', compact('tutor'));
    }

    public function edit(Tutor $tutor)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($tutor->center_id !== $centerId) {
            abort(403);
        }

        return view('Manager.tutors.edit', compact('tutor'));
    }

    public function update(TutorRequest $request, Tutor $tutor)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($tutor->center_id !== $centerId) {
            abort(403);
        }

        $input = $request->validated();

        if ($request->hasFile('image')) {
            if ($tutor->image) {
                $oldPath = ltrim((string) parse_url((string) $tutor->image, PHP_URL_PATH), '/');
                if (str_starts_with($oldPath, 'storage/')) {
                    $oldPath = substr($oldPath, strlen('storage/'));
                }
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('tutors', 'public');
            $input['image'] = $path;
        } else {
            $input['image'] = $tutor->image;
        }

        $tutor->update($input);

        return redirect()->route('manager.tutors.index')
            ->with('success', 'تم تعديل المدرّس بنجاح');
    }

    public function destroy(Tutor $tutor)
    {
        $centerId = auth('manager')->user()->center_id;

        if ($tutor->center_id !== $centerId) {
            abort(403);
        }

        if ($tutor->image) {
            $oldPath = ltrim((string) parse_url((string) $tutor->image, PHP_URL_PATH), '/');
            if (str_starts_with($oldPath, 'storage/')) {
                $oldPath = substr($oldPath, strlen('storage/'));
            }
            Storage::disk('public')->delete($oldPath);
        }

        $tutor->delete();

        return redirect()->route('manager.tutors.index')
            ->with('success', 'تم حذف المدرّس بنجاح');
    }
}
