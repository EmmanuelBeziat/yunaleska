<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/twitch', function () {
    return Socialite::driver('twitch')->redirect();
});

Route::get('/auth/twitch/callback', function () {
    $user = Socialite::driver('twitch')->user();

    // Get or create user
    $authUser = \App\Models\User::updateOrCreate(
        ['twitch_id' => $user->getId()],
        [
            'name' => $user->getName(),
            'nickname' => $user->getNickname(),
            'avatar' => $user->getAvatar(),
        ]
    );

    Auth::login($authuser);

    return redirect('/');
});
