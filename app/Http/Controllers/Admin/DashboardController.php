<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterManager;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $centersCount = Center::count();
        $managersCount = CenterManager::count();

        // 1️⃣ Centers per City (for Bar chart)
        $centersPerCity = Center::selectRaw('location as city, count(*) as count')
            ->groupBy('location')
            ->get();

        // 2️⃣ Managers per Center (for Pie chart)
        $managersPerCenter = CenterManager::with('center')
            ->get()
            ->groupBy(fn($m) => $m->center->name)
            ->map(fn($group) => [
                'center' => $group[0]->center->name,
                'count' => count($group)
            ])
            ->values();

        return view('Admin.dashboard', compact(
            'centersCount', 'managersCount', 'centersPerCity', 'managersPerCenter'
        ));
    }
}