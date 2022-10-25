<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/




/*
// https://www.youtube.com/watch?v=MYyJ4PuL4pY

Route::get('/hello', function() {
    // return '<h1>Hello World';
    // return response('<h1>Hello World</h1>');
    // return response('<h1>Hello World</h1>', 200); // Check the 'Network' tab in browser Inspect tools, then under 'Name', click on the route ('hello')
    // return response('<h1>Hello World</h1>', 404); // Check the 'Network' tab in browser Inspect tools, then under 'Name', click on the route ('hello')
    return response('<h1>Hello World</h1>', 200) // response() is a helper
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar'); // Send a CUSTOM HEADER    // Check the 'Network' tab in browser Inspect tools, then under 'Name', click on the route ('hello')
    
});

Route::get('/posts/{id}', function($id) { // Wildcard or slug (Route Parameters)
    // dd($id); // 'die and dump' method
    // ddd($id); // Dump, Die, Debug
    return response('Our Post id is: ' . $id); // Regular Expression Constraints (with Route Parameters): https://laravel.com/docs/9.x/routing#parameters-regular-expression-constraints
})->where('id', '[0-9]+');

Route::get('/search', function(\Illuminate\Http\Request $request) { // get the Query String Parameters from a route (URL) like '/search?name=Brad&city=Boston'
    // dd($request); // Check 'query'
    // dd($request->name); // URL is '/search?name=Brad&city=Boston'
    // dd($request->city); // URL is '/search?name=Brad&city=Boston'
    return $request->name . ' ' . $request->city; // URL is '/search?name=Brad&city=Boston'
});
*/

// Route::get('/', function () { // show All Listings in 'listings.blade.php' (listings/index.blade.php)
    // return view('listings', [ // passing data to view (will be used as variables in view) ('heading', 'listings')
    //     'listings' => \App\Models\Listing::all() // this returns an Eloquent Collection
    // ]);
// });

// show All Listings in 'listings.blade.php' (listings/index.blade.php)
Route::get('/', [App\Http\Controllers\ListingController::class, 'index']); // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

// Render the Create a Listing <form> in listings/create.blade.php
Route::get('/listings/create', [App\Http\Controllers\ListingController::class, 'create']); // Route Conflict with the '/listings/{listing}' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

// Store a new listing (submitting the previous create() <form> Or INSERT-ing a record for the first time)
Route::post('/listings', [App\Http\Controllers\ListingController::class, 'store']); // Route Conflict with the '/listings/{listing}' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

// Render the Edit a Listing <form> in listings/edit.blade.php    // this route will be accessed from the <a> HTML element in listings/show.blade.php, in order to render listings/edit.blade.php    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
Route::get('/listings/{listing}/edit', [App\Http\Controllers\ListingController::class, 'edit']); // Route Conflict with the '/listings/{listing}' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

// Update an already existing listing (submitting the previous edit() <form> Or UPDATE-ing an already existing record)    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
Route::put('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'update']); // Route Conflict with the '/listings/{listing}' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

// Delete an already existing listing    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
Route::delete('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'destroy']); // Route Conflict with the '/listings/{listing}' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

/*
Route::get('/listings/{id}', function($id) { // show a Single Listing in 'listing.blade.php' (listings/show.blade.php)    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    $listing = \App\Models\Listing::find($id);
    if ($listing) { // to avoid the error resulting in from directly typing in a non-existing id in the URL in the browser Address Bar
        return view('listing', [ // passing data to view (will be used as variables view) ('listing')
            // 'listing' => \App\Models\Listing::find($id)
            'listing' => $listing
        ]);
    } else {
        abort(404);
    }
    // return view('listing', [ // passing data to view (will be used as variables view) ('listing')
    //     'listing' => \App\Models\Listing::find($id)
    // ]);
});
*/

// Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
// Route::get('/listings/{listing}', function(\App\Models\Listing $listing) { // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // show a Single Listing in 'listing.blade.php' (listings/show.blade.php)    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    // $listing = \App\Models\Listing::find($id);
    // if ($listing) { // to avoid the error resulting in from directly typing in a non-existing id in the URL in the browser Address Bar
    //     return view('listing', [ // passing data to view (will be used as variables view) ('listing')
    //         // 'listing' => \App\Models\Listing::find($id)
    //         'listing' => $listing
    //     ]);
    // } else {
    //     abort(404);
    // }

    // return view('listing', [ // passing data to view (will be used as variables view) ('listing')
    //     'listing' => $listing
    // ]);
// });
// Show a Single Listing in 'listings.blade.php' (listings/show.blade.php)    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // this route will be accessed from the <a> HTML element in listings/listing-card.blade.php, in order to render listings/show.blade.php
Route::get('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'show']); // Route Conflict with the '/listings/create' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller



// Render register <form> (create() a new user) in users/create.blade.php
Route::get('/register', [App\Http\Controllers\UserController::class, 'create']); // we could call the method 'register' instead of 'create', but we try to stick to the Resource Controllers Naming Conventions as much as possible (Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller)

// Store a new registering user (submitting the previous create() <form> (submitting the <form> of register/create a new user) Or INSERT-ing a record for the first time)
Route::post('/users', [App\Http\Controllers\UserController::class, 'store']); // we could call the method 'submitRegister' instead of 'store', but we try to stick to the Resource Controllers Naming Conventions as much as possible (Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller)    // Route Conflict with the '/listings/{listing}' Route, Check 2:06:40 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
