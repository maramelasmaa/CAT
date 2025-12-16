<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CenterRequest;
use App\Models\Center;
use Illuminate\Support\Facades\Storage;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('Admin.centers.index', compact('centers'));
    }

    public function create()
    {
        return view('Admin.centers.create');
    }

    public function store(CenterRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('centers', 'public');
        }

        Center::create($data);

        return redirect()->route('centers.index')
            ->with('success', 'تم إضافة المركز بنجاح');
    }

 public function show(Center $center)
{
    return view('Admin.centers.details', compact('center'));
}


    public function edit(Center $center)
    {
        return view('Admin.centers.edit', compact('center'));
    }

    public function update(CenterRequest $request, Center $center)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            if ($center->image) {
                Storage::disk('public')->delete($center->image);
            }

            $data['image'] = $request->file('image')->store('centers', 'public');
        }

        $center->update($data);

        return redirect()->route('centers.index')
            ->with('success', 'تم تحديث بيانات المركز بنجاح');
    }

    public function destroy(Center $center)
    {
        if ($center->image) {
            Storage::disk('public')->delete($center->image);
        }

        $center->delete();

        return redirect()->route('centers.index')
            ->with('success', 'تم حذف المركز بنجاح');
    }
}