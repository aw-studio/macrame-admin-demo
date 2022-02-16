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

    //
    Route::get('/', [HomeController::class, 'show']);
    Route::get('/components', [HomeController::class, 'components']);

    // pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/items', [PageController::class, 'items'])->name('pages.items');
    Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::post('/pages/order', [PageController::class, 'order'])->name('pages.order');
    Route::post('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::post('/pages/{page}/upload', [PageController::class, 'upload'])->name('pages.upload');

    // files
    Route::get('/files/items', [FileController::class, 'files'])->name('files.files');
    Route::post('/files/upload', [FileController::class, 'upload'])->name('files.upload');

    // file collections
    Route::get('/files', [FileCollectionController::class, 'index'])->name('file-collections.index');
    Route::post('/files', [FileCollectionController::class, 'store'])->name('file-collections.show');
    Route::get('/files/{collection}', [FileCollectionController::class, 'show'])->name('file-collections.show');
    Route::post('/files/{collection}/upload', [FileCollectionController::class, 'upload'])->name('file-collections.upload');
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
