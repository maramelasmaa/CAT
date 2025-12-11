<?php

use Illuminate\Support\Facades\Route;

// AUTH CONTROLLERS
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\StudentAuthController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CenterManagerController;

// MANAGER CONTROLLERS
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\TutorController;
use App\Http\Controllers\Manager\CourseController;
use App\Http\Controllers\Manager\EnrollmentController;

// STUDENT CONTROLLERS
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\EnrollmentController as StudentEnrollmentController;
use App\Http\Controllers\Student\RatingController;


// ========================
// GENERAL AUTH ROUTES
// ========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// ========================
// STUDENT AUTH ROUTES
// ========================
Route::get('/student/register', [StudentAuthController::class, 'showRegisterForm'])
    ->name('student.register');

Route::post('/student/register', [StudentAuthController::class, 'register'])
    ->name('student.register.store');

// STUDENT LOGIN (optional if using same login page)
Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])
    ->name('student.login');

Route::post('/student/login', [StudentAuthController::class, 'login'])
    ->name('student.login.attempt');


// ========================
// STUDENT PAGES (after login)
// ========================
Route::middleware('auth:web')->group(function () {

    // Student Homepage (Courses + Centers)
    Route::get('/student/home', [StudentController::class, 'home'])
        ->name('student.home');

    // My Courses
    Route::get('/student/my-courses', [StudentController::class, 'myCourses'])
        ->name('student.myCourses');

    // Enrollment — reserve seat (on campus payment)
    Route::post('/student/courses/{course}/reserve', [StudentEnrollmentController::class, 'reserve'])
        ->name('student.reserve');

    // Enrollment — bank transfer proof
    Route::post('/student/courses/{course}/upload-proof', [StudentEnrollmentController::class, 'uploadBankProof'])
        ->name('student.uploadProof');

    // Rating
    Route::post('/student/enrollments/{enrollment}/rate', [RatingController::class, 'store'])
        ->name('student.rate');
});



// ========================
// ADMIN ROUTES
// ========================
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



// ========================
// MANAGER ROUTES
// ========================
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



// ========================
// PUBLIC PAGES
// ========================
Route::get('/', function () { return view('pages.home'); })->name('home');
Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');

