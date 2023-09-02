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


// LISTINGS Routes
// show All Listings in 'listings.blade.php' (listings/index.blade.php)
Route::get('/', [App\Http\Controllers\ListingController::class, 'index']);

// Render the Create a Listing <form> in listings/create.blade.php
Route::get('/listings/create', [App\Http\Controllers\ListingController::class, 'create'])->middleware('auth');

// Store a new listing (submitting the previous create() <form> Or INSERT-ing a record for the first time)
Route::post('/listings', [App\Http\Controllers\ListingController::class, 'store'])->middleware('auth');

// Render the Edit a Listing <form> in listings/edit.blade.php    // this route will be accessed from the <a> HTML element in listings/show.blade.php, in order to render listings/edit.blade.php
Route::get('/listings/{listing}/edit', [App\Http\Controllers\ListingController::class, 'edit'])->middleware('auth');

// Update an already existing listing (submitting the previous edit() <form> Or UPDATE-ing an already existing record)
Route::put('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'update'])->middleware('auth');

// Delete an already existing listing
Route::delete('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'destroy'])->middleware('auth');

// Render User Manage Listings page in listings/manage.blade.php (show the listings that ONLY BELONG to the currently logged in/authenticated user (not all listings) in order for him/her to manage his/her listings)
Route::get('/listings/manage', [App\Http\Controllers\ListingController::class, 'manage'])->middleware('auth');

// Show a Single Listing in 'listings.blade.php' (listings/show.blade.php)    // this route will be accessed from the <a> HTML element in listings/listing-card.blade.php, in order to render listings/show.blade.php
Route::get('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'show']);



// USERS Routes
// Render register <form> (create() a new user) in users/create.blade.php
Route::get('/register', [App\Http\Controllers\UserController::class, 'create'])->middleware('guest');

// Store a new registering user (submitting the previous create() <form> (submitting the <form> of register/create a new user) Or INSERT-ing a record for the first time)
Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);

// Log user out (user logout)
Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth');

// Render login <form> in users/login.blade.php
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login')->middleware('guest');

// Log user in (User login) i.e. AUTHENTICATION (submitting the previous login <form>)
Route::post('/users/authenticate', [\App\Http\Controllers\UserController::class, 'authenticate']);



// Laravel Socialite package (Social Login) (Google) (N.B. Added by me!)
// Google OAuth provider (Check the 'google' array key in config/services.php)
Route::get('/auth/google/redirect', [App\Http\Controllers\SocialiteController::class, 'googleRedirect']);
Route::get('/auth/google/callback', [App\Http\Controllers\SocialiteController::class, 'googleCallback']);