<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Check 3:13:30 in https://www.youtube.com/watch?v=MYyJ4PuL4pY



    // Render register <form> (a create() <form>)
    public function create() { // we could call the method 'register' instead of 'create', but we try to stick to the Resource Controllers Naming Conventions as much as possible (Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller)     // e.g. Action: create, Verb: GET, URI: /users/create, Route Name: listings.create
        return view('users.register');
    }

    // Store a new registering user (submitting the previous create() <form> (submitting the <form> of register/create a new user) Or INSERT-ing a record for the first time)
    public function store(Request $request) { // we could call the method 'submitRegister' instead of 'store', but we try to stick to the Resource Controllers Naming Conventions as much as possible (Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller)   // e.g. Action: store, Verb: POST, URI: /users, Route Name: users.store
        // dd($request->all());
        // dd($request['logo']);
        // dd($request->logo);
        // dd($request->file('logo'));

        // Validation    // Writing The Validation Logic: https://laravel.com/docs/9.x/validation#quick-writing-the-validation-logic
        $formFields = $request->validate([
            // Validation Rules: What rules we want for certain <form> <input> fields
            'name'                  => ['required', 'min:3'], // min:value: https://laravel.com/docs/9.x/validation#rule-min
            'email'                 => ['required', 'email', \Illuminate\Validation\Rule::unique('users', 'email')], // specifying the `email` column of the `users` table to be UNIQUE    // Note: When you have more than one validation rule for a certain <form> <input> field, use an ARRAY. Also, when you have a complicated validation rule that requires several arguments, you may use the Rule class \Illuminate\Validation\Rule::YOUR_RULE     to fluently construct the rule. Check https://laravel.com/docs/9.x/validation#rule-dimensions     AND     Check 2:15:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            // 'password'              => ['required', 'confirmed', 'min:6'], // For Password and Password Confirmation validation rules, check 'confirmed': https://laravel.com/docs/9.x/validation#rule-confirmed     AND     check 3:23:54 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            'password'              => 'required|confirmed|min:6', // For Password and Password Confirmation validation rules, check 'confirmed': https://laravel.com/docs/9.x/validation#rule-confirmed     AND     check 3:23:54 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            // 'company'     => ['required', \Illuminate\Validation\Rule::unique('listings', 'company')], // specifying the `company` column of the `listings` table to be UNIQUE    // Note: When you have more than one validation rule for a certain <form> <input> field, use an ARRAY. Also, when you have a complicated validation rule that requires several arguments, you may use the Rule class \Illuminate\Validation\Rule::YOUR_RULE     to fluently construct the rule. Check https://laravel.com/docs/9.x/validation#rule-dimensions     AND     Check 2:15:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            // 'location'    => 'required',
            // 'website'     => 'required',
            // 'tags'        => 'required',
            // 'description' => 'required'
            // 'logo'     => ['required', 'image']
        ]);
        // dd($formFields);



        // Hashing the `password` before saving it in the database `users` table    // For hashing passwords before saving them in the database, check 3:24:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        $formFields['password'] = bcrypt($formFields['password']);



        // Note: We'll register the user and AUTOMATICALLY LOGIN THEM! using the login() method    // Manually Authenticating Users: https://laravel.com/docs/9.x/authentication#authenticating-users    // Check 3:25:28 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        $user = \App\Models\User::create($formFields); // create (INSERT) the new registering user in the `users` table
        // dd($user);

        // Login the user AUTOMATICALLY after registration success!
        auth()->login($user); // AUTOMATICALLY Login (Authenticate) the newly registered user (make a certain user the currently authenticated user (i.e. the logged in user) (Set an existing user instance as the currently authenticated user): Authenticate A User Instance: https://laravel.com/docs/9.x/authentication#authenticate-a-user-instance


        // For Mass Assignment with the create() method, and the $fillable and $guarded properties, check 2:21:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Mass Assignment: https://laravel.com/docs/9.x/eloquent#mass-assignment
        // \App\Models\Listing::create($formFields); // INSERT the VALIDATED <input> values    // \App\Models\Listing::create($request->all()); IS VERY DANGEROUS!!
 
        // For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // For creating 'Flash Messages' and creating a special dedicated Blade Component file e.g. 'flash-message.blade.php' to display them using TWO ways, check 2:27:20 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // First way:
        // \Illuminate\Support\Facades\Session::flash('message', 'Listing Created!');

        // Second way:
        return redirect('/')->with('message', 'User created and logged in'); // redirect to the home page with a 'Flash Message'
    }

    // Log user out (user logout)
    public function logout(Request $request) {
        // For the complete process (code) of logging out, check 3:48:18 in https://www.youtube.com/watch?v=MYyJ4PuL4pY     AND     Check Logging Out: https://laravel.com/docs/9.x/authentication#logging-out     AND     Check Regenerating The Session ID (using invalidate() and regenerateToken() methods): https://laravel.com/docs/9.x/session#regenerating-the-session-id     AND     Check Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests
        // Logging Out: https://laravel.com/docs/9.x/authentication#logging-out
        auth()->logout(); // log the user out by removing the authenticated user information (the logged in user) from session
        $request->session()->invalidate(); // https://laravel.com/docs/9.x/session#regenerating-the-session-id
        $request->session()->regenerateToken(); // regenerate the session's CSRF token

        return redirect('/')->with('message', 'You have been logged out!'); // redirect to the home page with a 'Flash Message'
    }

}
