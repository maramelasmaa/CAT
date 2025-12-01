<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CenterManagerController;

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::resource('centers', CenterController::class)->names([
    'index'   => 'admin.centers.index',
    'create'  => 'admin.centers.create',
    'store'   => 'admin.centers.store',
    'show'    => 'admin.centers.show',
    'edit'    => 'admin.centers.edit',
    'update'  => 'admin.centers.update',
    'destroy' => 'admin.centers.destroy',
]);

Route::resource('center-managers', CenterManagerController::class)->names([
    'index'   => 'admin.managers.index',
    'create'  => 'admin.managers.create',
    'store'   => 'admin.managers.store',
    'show'    => 'admin.managers.show',
    'edit'    => 'admin.managers.edit',
    'update'  => 'admin.managers.update',
    'destroy' => 'admin.managers.destroy',
]);
