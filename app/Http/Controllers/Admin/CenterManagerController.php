<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CenterManagerRequest;
use App\Models\Center;
use App\Models\CenterManager;
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

        return redirect()->route('centerManagers.index')
            ->with('success', 'تم إضافة مدير المركز بنجاح');
    }

    public function show(CenterManager $center_manager)
    {
        return view('Admin.centerManagers.details', [
            'manager' => $center_manager
        ]);
    }

    public function edit(CenterManager $center_manager)
    {
        $centers = Center::all();

        return view('Admin.centerManagers.edit', [
            'manager' => $center_manager,
            'centers' => $centers
        ]);
    }

    public function update(CenterManagerRequest $request, CenterManager $center_manager)
    {
        $data = $request->validated();

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $center_manager->update($data);

        return redirect()->route('centerManagers.index')
            ->with('success', 'تم تحديث بيانات مدير المركز بنجاح');
    }

    public function destroy(CenterManager $center_manager)
    {
        $center_manager->delete();

        return redirect()->route('centerManagers.index')
            ->with('success', 'تم حذف مدير المركز بنجاح');
    }
}