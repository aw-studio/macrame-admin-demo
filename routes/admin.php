<?php

use Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Admin\Http\Controllers\Auth\NewPasswordController;
use Admin\Http\Controllers\Auth\PasswordResetLinkController;
use Admin\Http\Controllers\FileCollectionController;
use Admin\Http\Controllers\FileController;
use Admin\Http\Controllers\HomeController;
use Admin\Http\Controllers\PageController;
use Admin\Http\Middleware\AuthenticateAdmin;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => AuthenticateAdmin::class,
], function () {
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/items', [PageController::class, 'items'])->name('pages.items');
    Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::post('/pages/order', [PageController::class, 'order'])->name('pages.order');
    Route::post('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::post('/pages/{page}/upload', [PageController::class, 'upload'])->name('pages.upload');

    Route::get('/', [HomeController::class, 'show']);
    Route::get('/components', [HomeController::class, 'components']);
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/files/items', [FileController::class, 'items'])->name('files.items');
    Route::post('/files', [FileController::class, 'store']);
    Route::post('/files/{file}/delete', [FileController::class, 'destroy']);

    Route::post('/filecollections/store', [FileCollectionController::class, 'store']);
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
