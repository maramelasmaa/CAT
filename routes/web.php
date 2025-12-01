<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CenterManagerController;

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

// Centers CRUD (works fine)
Route::resource('centers', CenterController::class)->names([
    'index'   => 'centers.index',
    'create'  => 'centers.create',
    'store'   => 'centers.store',
    'show'    => 'centers.show',
    'edit'    => 'centers.edit',
    'update'  => 'centers.update',
    'destroy' => 'centers.destroy',
]);

// Center Managers CRUD (THE ONLY CORRECT BLOCK)
Route::resource('center-managers', CenterManagerController::class)->names([
    'index'   => 'centerManagers.index',
    'create'  => 'centerManagers.create',
    'store'   => 'centerManagers.store',
    'show'    => 'centerManagers.show',
    'edit'    => 'centerManagers.edit',
    'update'  => 'centerManagers.update',
    'destroy' => 'centerManagers.destroy',
]);
