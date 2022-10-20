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

Route::get('/', function () { // show All Listings in 'listings.blade.php'
    return view('listings', [ // passing data to view (will be used as variables in view) ('heading', 'listings')
        'listings' => \App\Models\Listing::all() // this returns an Eloquent Collection
    ]);
});

/*
Route::get('/listings/{id}', function($id) { // show a Single Listing in 'listing.blade.php'    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
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
Route::get('/listings/{listing}', function(\App\Models\Listing $listing) { // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // show a Single Listing in 'listing.blade.php'    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
    // $listing = \App\Models\Listing::find($id);
    // if ($listing) { // to avoid the error resulting in from directly typing in a non-existing id in the URL in the browser Address Bar
    //     return view('listing', [ // passing data to view (will be used as variables view) ('listing')
    //         // 'listing' => \App\Models\Listing::find($id)
    //         'listing' => $listing
    //     ]);
    // } else {
    //     abort(404);
    // }

    return view('listing', [ // passing data to view (will be used as variables view) ('listing')
        'listing' => $listing
    ]);
});
