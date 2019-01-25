<?php

namespace App\Http\Controllers;

use App\user;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();

        $users = User::where(['email' => $userSocial->getEmail()])->first();

        if ($users) {
            Auth::login($users);
            return redirect()->route('home');
        } else {

            $full_name = $userSocial->getName();
            $name_parts = $this->split_name($full_name);

            $user = User::create([
                'first_name' => $name_parts[0],
                'last_name' => $name_parts[1],
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider
            ]);

            Auth::login($user);

            return redirect()->route('home');
        }

    }

    // Facebook returns 'name', database has 'first_name' and 'last_name' columns
    function split_name($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    }

}
