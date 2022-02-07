<?php

use Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Admin\Http\Controllers\Auth\NewPasswordController;
use Admin\Http\Controllers\Auth\PasswordResetLinkController;
use Admin\Http\Controllers\FileController;
use Admin\Http\Controllers\HomeController;
use Admin\Http\Controllers\SiteController;
use Admin\Http\Middleware\AuthenticateAdmin;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => AuthenticateAdmin::class,
], function () {
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
    Route::get('/sites/items', [SiteController::class, 'items'])->name('sites.items');
    Route::get('/sites/{site}', [SiteController::class, 'show'])->name('sites.show');
    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');
    Route::post('/sites/order', [SiteController::class, 'order'])->name('sites.order');
    Route::post('/sites/{site}', [SiteController::class, 'update'])->name('sites.update');
    Route::post('/sites/{site}/upload', [SiteController::class, 'upload'])->name('sites.upload');

    Route::get('/', [HomeController::class, 'show']);
    Route::get('/components', [HomeController::class, 'components']);
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
});

Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});
