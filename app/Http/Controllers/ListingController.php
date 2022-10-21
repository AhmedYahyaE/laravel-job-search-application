<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Check 1:40:34 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
    // Note: Chech the Folder Structure of the 'views' folder and the Naming Conventions of files and folders inside it, to match the Resoure Controllers methods names (Example: index() method should return a Blade file called 'index.blade.php', or show() method should return a Blade file called 'show.blade.php', ...)!!
    // Resource Controllers: https://laravel.com/docs/9.x/controllers#resource-controllers
    // Actions Handled By Resource Controller: https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    /* Common Resource Routes: (N.B. Here, the 'resource' is 'Listing')
        * index   (GET)       - Show all listings
        * show    (GET)       - Show a single listing
        * create  (GET)       - Show <form> to create a new listing
        * store   (POST)      - Store a new listing (submitting the previous create() <form> Or INSERT-ing a record for the first time)
        * edit    (GET)       - Show <form> to edit listing
        * update  (PUT/PATCH) - Update listing (submitting the previous update() <form> Or UPDATE-ing an already existing record)
        * destroy (DELETE)    - Delete listing
    */


    // Show ALL listings in listings/index.blade.php
    public function index() { // e.g. Action: index, Verb: GET, URI: /photos, Route Name: photos.index
        return view('listings.index', [ // passing data to view (will be used as variables in view) ('heading', 'listings')
            'listings' => \App\Models\Listing::all() // this returns an Eloquent Collection
        ]);
    }

    // Show a SINGLE listing in listings/show.blade.php
    public function show(\App\Models\Listing $listing) { // e.g. Action: show, Verb: GET, URI: /photos/{photo}, Route Name: photos.show    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
        return view('listings.show', [ // passing data to view (will be used as variables view) ('listing')
            'listing' => $listing
        ]);
    }
}
