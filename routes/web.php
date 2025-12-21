<?php

use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/activities', fn() => view('pages.activities'))->name('activities');
Route::get('/programs', fn() => view('pages.programs'))->name('programs');

// Authentication
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

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

// Parent module
Route::prefix('parent')->group(function () {
    Route::get('/dashboard', fn() => view('parent.dashboard'))->name('parent.dashboard');
    Route::get('/child-profile', fn() => view('parent.child-profile'))->name('parent.child');
    Route::get('/reports', fn() => view('parent.reports'))->name('parent.reports');
    Route::get('/attendance', fn() => view('parent.attendance'))->name('parent.attendance');
    Route::get('/invoices', fn() => view('parent.invoices'))->name('parent.invoices');
    Route::get('/health', fn() => view('parent.health'))->name('parent.health');
    Route::get('/messages', fn() => view('parent.messages'))->name('parent.messages');
    Route::get('/notifications', fn() => view('parent.notifications'))->name('parent.notifications');
    Route::get('/events', fn() => view('parent.events'))->name('parent.events');
});

