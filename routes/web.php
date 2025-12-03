<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CenterManagerController;

use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\TutorController;
use App\Http\Controllers\Manager\CourseController;
use App\Http\Controllers\Manager\EnrollmentController;



// =====================
// AUTH ROUTES
// =====================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// =====================
// ADMIN ROUTES
// =====================
Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

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



// =====================
// MANAGER ROUTES
// =====================
Route::prefix('manager')
    ->name('manager.')
    ->middleware('auth:manager')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [ManagerDashboardController::class, 'index'])
            ->name('dashboard');

        // Tutors
        Route::resource('tutors', TutorController::class);
        Route::get('tutors/{tutor}/details', [TutorController::class, 'details'])
            ->name('tutors.details');

        // Courses
        Route::resource('courses', CourseController::class);
        Route::get('courses/{course}/details', [CourseController::class, 'details'])
            ->name('courses.details');

        // Enrollments
        Route::get('enrollments', [EnrollmentController::class, 'index'])
            ->name('enrollments.index');

        Route::get('enrollments/{enrollment}/details', [EnrollmentController::class, 'details'])
            ->name('enrollments.details');

        Route::post('enrollments/{enrollment}/approve', [EnrollmentController::class, 'approve'])
            ->name('enrollments.approve');

        Route::post('enrollments/{enrollment}/decline', [EnrollmentController::class, 'decline'])
            ->name('enrollments.decline');


    });
       

