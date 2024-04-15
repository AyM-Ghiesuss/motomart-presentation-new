<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    // {
    //     try{
    //         $SocialUser = Socialite::driver($provider)->user();
    //         if(User::where('email',$SocialUser->getEmail())->exists())
    //         {

    //             return redirect('/')->with('error', 'This Email uses different method to login');
    //         }

    //         $user =  User::where([
    //             'provider' => $provider,
    //             'provider_id' => $SocialUser->id
    //         ])->first();

    //         if(!$user)
    //         {
    //             $user = User::create([
    //                 'name' => $SocialUser->getName(),
    //                 'email' => $SocialUser->getEmail(),
    //                 'provider' => $provider,
    //                 'provider_id' => $SocialUser->getId(),
    //                 'provider_token' => $SocialUser->token,
    //                 'email_verified_at' =>now()


    //             ]);
    //         }
    //         Auth::login($user);
    //         return redirect('/');


    //     }
    //     catch(\Exception $e)
    //     {
    //         return redirect('/');
    //     }


    //     // $user = User::updateOrCreate([
    //     //     'provider_id' => $SocialUser->id,
    //     //     'provider' => $provider
    //     // ], [
    //     //     'name' => $SocialUser->name,
    //     //     'email' => $SocialUser->email,
    //     //     'provider_token' => $SocialUser->token,
    //     // ]);


    // }

    {
        try {
            // Check if user is already authenticated
            if (Auth::check()) {
                // If user is authenticated, directly link or create account based on provider
                $user = Auth::user();
                $user->update([
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                ]);
                return redirect('/');
            }

            // User is not authenticated, continue with the existing logic
            $SocialUser = Socialite::driver($provider)->user();
            $existingUser = User::where('email', $SocialUser->getEmail())->first();

            if ($existingUser) {
                // Existing user found
                if ($existingUser->provider !== $provider) {
                    // Email associated with a different login method
                    return redirect('/')->with('error', 'This Email uses a different method to login');
                }

                // Login the existing user
                Auth::login($existingUser);
                return redirect('/');
            } else {
                // Create a new user
                $user = User::create([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                    'email_verified_at' => now()
                ]);
                Auth::login($user);
                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred.');
        }
    }
}
