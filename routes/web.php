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

Route::get('/', function () {
    return view('listings', [ // passing data to view
        'heading'  => 'Latest Listings',
        'listings' => [
            [
                'id'          => 1,
                'title'       => 'Listing One',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],
            [
                'id'          => 2,
                'title'       => 'Listing Two',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],
        ]
    ]);
});

