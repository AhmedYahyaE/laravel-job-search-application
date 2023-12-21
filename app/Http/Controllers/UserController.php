<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Render register <form> (a create() <form>)
    public function create() {
        return view('users.register');
    }

    // Store a new registering user (submitting the previous create() <form> (submitting the <form> of register/create a new user) Or INSERT-ing a record for the first time)
    public function store(Request $request) {
        // Validation
        $formFields = $request->validate([
            'name'                  => ['required', 'min:3'],
            'email'                 => ['required', 'email', \Illuminate\Validation\Rule::unique('users', 'email')],
            'password'              => 'required|confirmed|min:6'
        ]);
        // dd($formFields);


        // Hashing the `password` before saving it in the database `users` table
        $formFields['password'] = bcrypt($formFields['password']);


        // Note: We'll register the user and IMMEDIATELY and AUTOMATICALLY and DIRECTLY LOGIN THEM! using the login() method    // Manually Authenticating Users: https://laravel.com/docs/9.x/authentication#authenticating-users
        $user = User::create($formFields); // create (INSERT) the new registering user in the `users` table
        // dd($user);

        // Login the user in IMMEDIATELY and AUTOMATICALLY and DIRECTLY after registration success!
        auth()->login($user); // IMMEDIATELY and AUTOMATICALLY and DIRECTLY Log (Authenticate) the newly registered user in (make a certain user the currently authenticated user (i.e. the logged in user)) (Set an existing user instance as the currently authenticated user): Authenticate A User Instance: https://laravel.com/docs/9.x/authentication#authenticate-a-user-instance


        return redirect('/')->with('message', 'User created and logged in');
    }

    // Log user out (user logout)
    public function logout(Request $request) {
        auth()->logout(); // log the user out by removing the authenticated user information (the logged in user) from session
        $request->session()->invalidate(); // https://laravel.com/docs/9.x/session#regenerating-the-session-id
        $request->session()->regenerateToken(); // regenerate the session's CSRF token

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Render login <form> in users/login.blade.php
    public function login() {
        return view('users.login');
    }

    // Log in the user in (Authenticate user) (User login) i.e. AUTHENTICATION (submitting the previous login <form>)
    public function authenticate(Request $request) {
        // Validation
        $formFields = $request->validate([
            'email'    => ['required', 'email'],
            'password' => 'required'

        ]);
        // dd($formFields);


        // Note: Authentication and Authentication Guards: Laravel's authentication services will retrieve users from your database based on your authentication guard's "provider" configuration. In the default config/auth.php configuration file, the Eloquent user provider is specified and it is instructed to use the App\Models\User model when retrieving users. You may change these values within your configuration file based on the needs of your application.
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate(); // manually regenerate the session ID: https://laravel.com/docs/9.x/session#regenerating-the-session-id

            return redirect('/')->with('message', 'You are now logged in!');
        }


        // If login fails (for any reasons like wrong credentials, non-existing user, ...)
        // For security (to not disclose (let the user know) exactly which credentials is incorrect or doesn't exist in the first place (whether it's the Email or the Password) i.e. because we don't want the user to know if for example the entered wrong email doesn't originally exist in the first place), we must show the SAME error message for `email` and `password`, and we'll show the error message under the `email` <input> field even if it's the password that is wrong
        return back()->withErrors([
            'email' => 'Invalid Credentials'
        ])->onlyInput('email'); // show the error of both `email` and `password` under the `email` <input> field ONLY
    }

}