<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('Student.centers.index', compact('centers'));
    }

    public function show(Center $center)
    {
        $center->load('courses.tutor');
        return view('Student.centers.details', compact('center'));
    }
}
