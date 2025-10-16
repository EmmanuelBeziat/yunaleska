<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return Auth::check() ? view('dashboard') : redirect()->route('login');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

use App\Http\Controllers\Auth\TwitchController;

Route::get('/auth/twitch', [TwitchController::class, 'redirectToTwitch'])->name('twitch.login');
Route::get('/auth/twitch/callback', [TwitchController::class, 'handleTwitchCallback'])->name('twitch.callback');

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::resource('admin/badges', \App\Http\Controllers\Admin\BadgesController::class);
});
