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
    public function index(/*Request $request*/) { // e.g. Action: index, Verb: GET, URI: /listings, Route Name: listings.index
        // Note: If you have a URL with Query String Parameters (e.g. '/search?name=Brad&city=Boston'), and you want to get those parameters, we pass in the Request $request object (as a Dependency Injection) to the route method or to the controller method, then write dd($request); (you'll find the Query String Parameters in the 'query' object), and to access a Query String Parameter, write dd($request->name), dd($request->city), Or just (WITHOUT Dependency Injection i.e. without passing in the Request $request) use the request() helper like this: dd(request()); (you'll find the Query String Parameters in the 'query' object) and to access a Query String Parameter, write dd(request()->city); OR dd(request('city')); . And if you want to get the Query String Parameters as an ARRAY of name & value, write dd(request(['city'])); . Check 22:29 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // 'tag' comes as a Query String Parameter from the <a> HTML anchor link element in the components/listing-tags.blade.php Blade Component which is used (rendered) in listings/show.blade.php and components/listing-card.blade.php (which, in turn, is used (rendered in listings/index.blade.php))
        // dd(request()); // using the request() helper method    // is the same as:    dd($request); // You must in the Request $request object as a Dependency Injection
        // dd(request('tag')); // is the same as: dd(request()->tag);    // is the same as:    dd($request->tag); // You must in the Request $request object as a Dependency Injection
        // dd(request(['tag'])); // passing in 'tag' as an ARRAY
        // dd(request(['tag', 'search'])); // passing in 'tag' and 'search' as an ARRAY

        // Test the paginate() method:
        // dd(\App\Models\Listing::latest()->filter(request(['tag', 'search']))->paginate(2));


        // 'Scope Filtering' of tags and the Search <form> in partials/_search.blade.php (which utilizes 'Query Scopes' (Local Scopes or Dynamic Scopes)), check 1:49:06 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // Query Scopes: https://laravel.com/docs/9.x/eloquent#query-scopes    // Local Scopes: https://laravel.com/docs/9.x/eloquent#local-scopes    // Dynamic Scopes: https://laravel.com/docs/9.x/eloquent#dynamic-scopes
        return view('listings.index', [ // passing data to view (will be used as variables in view) ('heading', 'listings')
            // 'listings' => \App\Models\Listing::all() // this returns an Eloquent Collection
            // 'listings' => \App\Models\Listing::latest()->filter(request(['tag']))->get() // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
            // 'listings' => \App\Models\Listing::latest()->filter(request(['tag', 'search']))->get() // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)

            // For Pagination explanation, check 2:38:46 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            'listings' => \App\Models\Listing::latest()->filter(request(['tag', 'search']))->paginate(6) // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
            // 'listings' => \App\Models\Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(2) // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
        ]);
    }

    // Show a SINGLE listing in listings/show.blade.php
    public function show(\App\Models\Listing $listing) { // e.g. Action: show, Verb: GET, URI: /listings/{listing}, Route Name: listings.show    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
        return view('listings.show', [ // passing data to view (will be used as variables view) ('listing')
            'listing' => $listing
        ]);
    }

    // Render the Create a Listing <form> in listings/create.blade.php
    public function create() { // e.g. Action: create, Verb: GET, URI: /listings/create, Route Name: listings.create
        return view('listings.create');
    }

    // Store a new listing (submitting the previous create() <form> Or INSERT-ing a record for the first time)
    public function store(Request $request) { // e.g. Action: store, Verb: POST, URI: /listings, Route Name: listings.store
        // dd($request->all());

        // Validation    // Writing The Validation Logic: https://laravel.com/docs/9.x/validation#quick-writing-the-validation-logic
        $formFields = $request->validate([
            // Validation Rules: What rules we want for certain <form> <input> fields
            'title'       => 'required',
            'company'     => ['required', \Illuminate\Validation\Rule::unique('listings', 'company')], // specifying the `company` column of the `listings` table to be UNIQUE    // Note: When you have more than one validation rule for a certain <form> <input> field, use an ARRAY. Also, when you have a complicated validation rule that requires several arguments, you may use the Rule class \Illuminate\Validation\Rule::YOUR_RULE     to fluently construct the rule. Check https://laravel.com/docs/9.x/validation#rule-dimensions     AND     Check 2:15:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            'location'    => 'required',
            'website'     => 'required',
            'email'       => ['required', 'email'],
            'tags'        => 'required',
            'description' => 'required'
        ]);
        // dd($formFields);

        // For Mass Assignment with the create() method, and the $fillable and $guarded properties, check 2:21:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Mass Assignment: https://laravel.com/docs/9.x/eloquent#mass-assignment
        \App\Models\Listing::create($formFields); // INSERT the VALIDATED <input> values    // \App\Models\Listing::create($request->all()); IS VERY DANGEROUS!!
 
        // For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // For creating 'Flash Messages' and creating a special dedicated Blade Component file e.g. 'flash-message.blade.php' to display them using TWO ways, check 2:27:20 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // First way:
        // \Illuminate\Support\Facades\Session::flash('message', 'Listing Created!');

        // Second way:
        return redirect('/')->with('message', 'Listing created successfully!'); // redirect to the home page with a 'Flash Message'
    }
}
