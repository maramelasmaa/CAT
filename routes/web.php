<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CenterManagerController;

// Shared login
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Protected admin routes
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('centers', CenterController::class)->names([
        'index'   => 'centers.index',
        'create'  => 'centers.create',
        'store'   => 'centers.store',
        'show'    => 'centers.show',
        'edit'    => 'centers.edit',
        'update'  => 'centers.update',
        'destroy' => 'centers.destroy',
    ]);

    Route::resource('center-managers', CenterManagerController::class)->names([
        'index'   => 'centerManagers.index',
        'create'  => 'centerManagers.create',
        'store'   => 'centerManagers.store',
        'show'    => 'centerManagers.show',
        'edit'    => 'centerManagers.edit',
        'update'  => 'centerManagers.update',
        'destroy' => 'centerManagers.destroy',
    ]);
});