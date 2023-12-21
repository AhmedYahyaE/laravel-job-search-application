<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    // Laravel Socialite package (Social Login) (N.B. Added by me!)



    // Redirect the user to Google OAuth provider (Check the 'google' array key in config/services.php)
    public function googleRedirect() {
        // dd(Socialite::driver('google')->redirect());
        return Socialite::driver('google')->redirect(); // Returns and redirects to/Shows the View (the HTML/CSS page of the User Redirection/Authentication of Google) (This functions shows the 'Sign in with Google' view)
    }

    // Receive the callback from Google OAuth provider after the user has been authenticated (Check the 'google' array key in config/services.php)
    public function googleCallback() {
        $googleUser = Socialite::driver('google')->user();
        // dd($googleUser);

        // If the user doesn't exist in the `users` database table, insert them, then log them in (authenticate them), but if they exist, get them from the `users` database table, then log them in (authenticate them) too (N.B. In both cases, we'll authenticate the user (log them in))
        $user = User::updateOrCreate([ // if that email is found, update that record, but if not, create that whole record    // Upserts: https://laravel.com/docs/10.x/eloquent#upserts
            'email' => $googleUser->email // Find that user by their email (because it has the unique constraint in the `users` table)
        ], [
            'name'     => $googleUser->name,
            'password' => \Illuminate\Support\Facades\Hash::make(\illuminate\Support\Str::random(6)) // Generate a random 'hash'-ed `password` for that user
        ]);


        // Authenticate the user (log the user in) manually
        \Illuminate\Support\Facades\Auth::login($user); // Authenticate A User Instance: https://laravel.com/docs/10.x/authentication#authenticate-a-user-instance

        return redirect('/');
    }

}
