<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class TwitchController extends Controller
{
    public function redirectToTwitch()
    {
        return Socialite::driver('twitch')->redirect();
    }

    public function handleTwitchCallback()
    {
        try {
            $twitchUser = Socialite::driver('twitch')->user();

            // Get or create user
            $user = \App\Models\User::updateOrCreate(
                ['twitch_id' => $twitchUser->getId()],
                [
                    'name' => $twitchUser->getName(),
                    'nickname' => $twitchUser->getNickname(),
                    'avatar' => $twitchUser->getAvatar(),
                ]
            );

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            \Log::error('Twitch authentication error: ' . $e->getMessage());
            return redirect('/login')->withErrors(['error' => 'Impossible de se connecter avec Twitch. Veuillez réessayer.']);
        }
    }
}
