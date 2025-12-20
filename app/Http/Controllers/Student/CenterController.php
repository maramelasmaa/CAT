<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::query()
            ->withCount('courses')
            ->orderByDesc('created_at')
            ->get();
        return view('Student.centers.index', compact('centers'));
    }

    public function search(Request $request)
    {
        $term = trim((string) $request->input('q', $request->input('name', '')));

        $query = Center::query()
            ->withCount('courses')
            ->orderByDesc('created_at');

        if ($term !== '') {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $centers = $query->get();

        return view('Student.centers.index', compact('centers'));
    }

    public function show(Center $center)
    {
        $center->load('courses.tutor');
        return view('Student.centers.details', compact('center'));
    }

    public function searchCourses(Center $center, Request $request)
    {
        $term = trim((string) $request->input('q', $request->input('title', '')));

        $coursesQuery = $center->courses()->with('tutor')->orderByDesc('created_at');

        if ($term !== '') {
            $coursesQuery->where('title', 'LIKE', '%' . $term . '%');
        }

        $center->setRelation('courses', $coursesQuery->get());

        return view('Student.centers.details', compact('center'));
    }
}
