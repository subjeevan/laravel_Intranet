<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class SocialiteController extends Controller
{
    /**
     * Function: authProviderRedirect
     * Description: This function will redirect to Given Provider
     * @param NA
     * @return void
     */
    public function authProviderRedirect($provider) {
        if ($provider) {
            // dd(Session::all()); // Check if the session is actually storing the state
            return Socialite::driver($provider)->redirect();

        }
        abort(404);
    }

    /**
     * Function: googleAuthentication
     * Decription: This function will authenticate the user through the Google Account
     * @param NA
     * @return void
     */
    public function socialAuthentication($provider) {
        $socialUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'socialUser_id' => $socialUser->id,
        ], [
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'github_token' => $socialUser->token,
            'github_refresh_token' => $socialUser->refreshToken,
        ]);

        Auth::login($user);
        return redirect('/dashboard');

    }
}
