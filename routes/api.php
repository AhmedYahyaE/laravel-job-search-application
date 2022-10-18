<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




/*
// https://www.youtube.com/watch?v=MYyJ4PuL4pY
// API
// Note: You must prefix ALL URLS with '/api/' because this is an API
Route::get('/posts', function() { // Note: You must prefix ALL URLS with '/api/' because this is an API i.e.    '/api/posts'
    return response()->json([ // we use json() helper to send a JSON response because this is an API route (in api.php)
        'posts' => [
            [
                'title' => 'Post One',
            ]
        ]
    ]); 
});
*/
