<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Oauth2Controller extends Controller
{
    public function oauth2google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        $this->handleuser('google');

        return redirect('/');
    }

    public function oauth2facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookcallback()
    {
        $this->handleuser('facebook');

        return redirect('/');
    }

    public function oauth2github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubcallback()
    {
        $this->handleuser('github');

        return redirect('/');
    }

    private static function handleuser($provider)
    {
        $social_user = Socialite::driver($provider)->user();

        $data = [
            'name' => $social_user->getName(),
            'email' => $social_user->getEmail()
        ];

        if (!($data['name']) || is_null($data['name'])) {
            $data['name'] = '';
        }

        $user = User::where('email', '=', $social_user->getEmail())->first();

        if ($user === null) {
            Auth::login(User::firstOrCreate($data));
        } else {
            Auth::login($user);
        }
    }
}
