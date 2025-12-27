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

        $latestCenters = Center::query()
            ->latest()
            ->take(5)
            ->get();

        $latestManagers = CenterManager::query()
            ->with('center')
            ->latest()
            ->take(5)
            ->get();

        return view('Admin.dashboard', compact(
            'centersCount',
            'managersCount',
            'latestCenters',
            'latestManagers'
        ));
    }
}