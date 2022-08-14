<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\SignUpController;
use App\Http\Controllers\User\SignInController;
use App\Http\Controllers\User\SignOutController;

Route::get('/', fn () => redirect(route('sites.list')))->middleware('auth');

Route::name('sites.')->middleware('auth')->group(function () {
    Route::get('sites', [SiteController::class, 'index'])->name('list');

});

Route::prefix('/user')->name('user.')->group(function () {
    Route::get('sing-in', [SignInController::class, 'show'])->name('sign_in');
    Route::post('login', [SignInController::class, 'login'])->name('login');

    Route::get('sign-up', [SignUpController::class, 'show'])->name('sign_up');
    Route::post('register', [SignUpController::class, 'register'])->name('register');

    Route::get('sing-out', [SignOutController::class, 'signOut'])->name('sign_out');

});
