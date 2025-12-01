<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterManager;

class DashboardController extends Controller
{
    public function index()
    {
        $centersCount = Center::count();
        $managersCount = CenterManager::count();

        return view('Admin.dashboard', compact('centersCount', 'managersCount'));
    }
}
