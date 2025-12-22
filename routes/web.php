<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ParentController;


// Public pages
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/aboutus', fn() => view('pages.about'))->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/activities', fn() => view('pages.activities'))->name('activities');
Route::get('/programs', fn() => view('pages.programs'))->name('programs');


// Authentication
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Admin module
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/users', fn() => view('admin.users'))->name('admin.users');
    Route::get('/children', fn() => view('admin.children'))->name('admin.children');
    Route::get('/staff', fn() => view('admin.staff'))->name('admin.staff');
    Route::get('/attendance', fn() => view('admin.attendance'))->name('admin.attendance');
    Route::get('/reports', fn() => view('admin.reports'))->name('admin.reports');
    Route::get('/invoices', fn() => view('admin.invoices'))->name('admin.invoices');
    Route::get('/analytics', fn() => view('admin.analytics'))->name('admin.analytics');
    Route::get('/announcements', fn() => view('admin.announcements'))->name('admin.announcements');
    Route::get('/settings', fn() => view('admin.settings'))->name('admin.settings');
});

// Caregiver module
Route::prefix('caregiver')->group(function () {
    Route::get('/dashboard', fn() => view('caregiver.dashboard'))->name('caregiver.dashboard');
    Route::get('/assigned-children', fn() => view('caregiver.assigned-children'))->name('caregiver.assigned');
    Route::get('/attendance', fn() => view('caregiver.attendance'))->name('caregiver.attendance');
    Route::get('/daily-reports', fn() => view('caregiver.daily-reports'))->name('caregiver.reports');
    Route::get('/health-records', fn() => view('caregiver.health-records'))->name('caregiver.health');
    Route::get('/messages', fn() => view('caregiver.messages'))->name('caregiver.messages');
    Route::get('/schedule', fn() => view('caregiver.schedule'))->name('caregiver.schedule');
    Route::get('/leave-requests', fn() => view('caregiver.leave-requests'))->name('caregiver.leave');
});

// Parent module Route::middleware('auth')
// Parent module
    Route::prefix('parent')->group(function () {
    Route::get('/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');
    Route::get('/child-profile', [ParentController::class, 'childProfile'])->name('parent.child-profile');
    Route::get('/reports', [ParentController::class, 'reports'])->name('parent.reports');
    Route::get('/attendance', [ParentController::class, 'attendance'])->name('parent.attendance');
    Route::get('/invoices', [ParentController::class, 'invoices'])->name('parent.invoice');
    Route::get('/health', [ParentController::class, 'health'])->name('parent.health');
    Route::get('/messages', [ParentController::class, 'messages'])->name('parent.messages');
    Route::get('/notifications', [ParentController::class, 'notifications'])->name('parent.notifications');
    Route::get('/events', [ParentController::class, 'events'])->name('parent.events');
    Route::get('/settings', [ParentController::class, 'settings'])->name('parent.settings');
});

// Debug Route
Route::get('/debug-auth', function () {
    return response()->json([
        'is_logged_in' => auth()->check(),
        'user' => auth()->user(),
        'session_id' => session()->getId(),
        'session_driver' => config('session.driver'),
        'session_lifetime' => config('session.lifetime'),
        'session_secure' => config('session.secure'),
        'session_domain' => config('session.domain'),
    ]);
});
