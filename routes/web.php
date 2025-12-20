<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\StudentAuthController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CenterManagerController;

/*
|--------------------------------------------------------------------------
| MANAGER CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\TutorController;
use App\Http\Controllers\Manager\CourseController;
use App\Http\Controllers\Manager\EnrollmentController as ManagerEnrollmentController;

/*
|--------------------------------------------------------------------------
| STUDENT CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Student\CenterController as StudentCenterController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\EnrollmentController as StudentEnrollmentController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('pages.home'))->name('home');
Route::get('/about', fn () => view('pages.about'))->name('about');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login.form');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.attempt');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/student/register', [StudentAuthController::class, 'showRegisterForm'])
    ->name('student.register');

Route::post('/student/register', [StudentAuthController::class, 'register'])
    ->name('student.register.store');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('centers', CenterController::class)->names('centers');

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

/*
|--------------------------------------------------------------------------
| MANAGER ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('manager')
    ->middleware('auth:manager')
    ->name('manager.')
    ->group(function () {

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
        Route::get('enrollments', [ManagerEnrollmentController::class, 'index'])
            ->name('enrollments.index');

        Route::patch('enrollments/{enrollment}/approve',
            [ManagerEnrollmentController::class, 'approve'])
            ->name('enrollments.approve');

        Route::patch('enrollments/{enrollment}/decline',
            [ManagerEnrollmentController::class, 'decline'])
            ->name('enrollments.decline');
    });

/*
|--------------------------------------------------------------------------
| STUDENT ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('student')
    ->middleware('auth:web')
    ->name('student.')
    ->group(function () {

        // Centers
        Route::get('/centers', [StudentCenterController::class, 'index'])
            ->name('centers.index');

        Route::get('/centers/search', [StudentCenterController::class, 'search'])
            ->name('centers.search');

        Route::get('/centers/{center}/courses/search', [StudentCenterController::class, 'searchCourses'])
            ->name('centers.courses.search');

        Route::get('/centers/{center}', [StudentCenterController::class, 'show'])
            ->name('centers.show');

        // Course details
        Route::get('/courses/{course}', [StudentCourseController::class, 'show'])
            ->name('courses.show');

        // Student enrollments list
        Route::get('/enrollments', [StudentEnrollmentController::class, 'index'])
            ->name('enrollments.index');

        // ✅ ONE enrollment route (on-campus + bank)
        Route::post('/courses/{course}/enroll',
            [StudentEnrollmentController::class, 'store'])
            ->name('enrollments.store');
    });