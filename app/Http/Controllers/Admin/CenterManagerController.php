<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CenterManagerRequest;
use App\Models\Center;
use App\Models\CenterManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CenterManagerController extends Controller
{
    public function index()
    {
        $managers = CenterManager::with('center')->get();
        return view('Admin.centerManagers.index', compact('managers'));
    }

    public function create()
    {
        $centers = Center::all();
        return view('Admin.centerManagers.create', compact('centers'));
    }

    public function store(CenterManagerRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        CenterManager::create($data);

        return redirect()->route('admin.managers.index')
            ->with('success', 'تم إضافة مدير المركز بنجاح');
    }

    public function edit(CenterManager $manager)
    {
        $centers = Center::all();

        return view('Admin.centerManagers.edit', compact('manager', 'centers'));
    }

    public function update(CenterManagerRequest $request, CenterManager $manager)
    {
        $data = $request->validated();

        // Password is optional during update
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $manager->update($data);

        return redirect()->route('admin.managers.index')
            ->with('success', 'تم تحديث بيانات مدير المركز بنجاح');
    }

    public function destroy(CenterManager $manager)
    {
        $manager->delete();

        return redirect()->route('admin.managers.index')
            ->with('success', 'تم حذف مدير المركز بنجاح');
    }
}
