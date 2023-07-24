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
    public function index(/* Request $request */) { // e.g. Action: index, Verb: GET, URI: /listings, Route Name: listings.index
        // Note: If you have a URL with Query String Parameters (e.g. '/search?name=Brad&city=Boston'), and you want to get those parameters, we pass in the Request $request object (as a Dependency Injection) to the route method or to the controller method, then write dd($request); (you'll find the Query String Parameters in the 'query' object), and to access a Query String Parameter, write dd($request->name), dd($request->city), Or just (WITHOUT Dependency Injection i.e. without passing in the Request $request) use the request() helper like this: dd(request()); (you'll find the Query String Parameters in the 'query' object) and to access a Query String Parameter, write dd(request()->city); OR dd(request('city')); . And if you want to get the Query String Parameters as an ARRAY of name & value, write dd(request(['city'])); . Check 22:29 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // 'tag' comes as a Query String Parameter from the <a> HTML anchor link element in the components/listing-tags.blade.php Blade Component which is used (rendered) in listings/show.blade.php and components/listing-card.blade.php (which, in turn, is used (rendered in listings/index.blade.php))
        // dd(request()); // using the request() helper method    // is the same as:    dd($request); // You must in the Request $request object as a Dependency Injection

        // dd(request('tag')); // is the same as: dd(request()->tag);    // is the same as:    dd($request->tag); // You must in the Request $request object as a Dependency Injection
        // dd(request(['tag'])); // passing in 'tag' as an ARRAY

        // dd(request('search')); // is the same as: dd(request()->search);    // is the same as:    dd($request->search); // You must in the Request $request object as a Dependency Injection
        // dd(request(['search'])); // passing in 'search' as an ARRAY

        // dd(request(['tag', 'search'])); // passing in 'tag' and 'search' as an ARRAY

        // dd($request->input());

        // Test the paginate() method:
        // dd(\App\Models\Listing::latest()->filter(request(['tag', 'search']))->paginate(2));


        // 'Scope Filtering' of tags (the <a> HTML element in components/listing-tags.blade.php) and the Search Bar <form> in partials/_search.blade.php (which utilizes 'Query Scopes' (Local Scopes or Dynamic Scopes)), check 1:49:06 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // Query Scopes: https://laravel.com/docs/9.x/eloquent#query-scopes    // Local Scopes: https://laravel.com/docs/9.x/eloquent#local-scopes    // Dynamic Scopes: https://laravel.com/docs/9.x/eloquent#dynamic-scopes
        return view('listings.index', [ // passing data to view (will be used as variables in view) ('heading', 'listings')
            // 'listings' => \App\Models\Listing::all() // this returns an Eloquent Collection
            // 'listings' => \App\Models\Listing::latest()->filter(request(['tag']))->get() // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> HTML element in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
            // 'listings' => \App\Models\Listing::latest()->filter(request(['tag', 'search']))->get() // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)

            // For Pagination explanation, check 2:38:46 in https://www.youtube.com/watch?v=MYyJ4PuL4pY

            // Dynamic Scopes: https://laravel.com/docs/9.x/eloquent#dynamic-scopes
            'listings' => \App\Models\Listing::latest()->filter(request(['tag', 'search']))->paginate(6) // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
            // 'listings' => \App\Models\Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(2) // we call the scopeFilter() method in the Listing.php model, but we remove the 'scope' prefix (for filtering with tags)    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
        ]);
    }

    // Show a SINGLE listing in listings/show.blade.php
    public function show(\App\Models\Listing $listing) { // e.g. Action: show, Verb: GET, URI: /listings/{listing}, Route Name: listings.show    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // {id} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
        // dd($listing);

        return view('listings.show', [ // passing data to view (will be used as variables in view) ('listing')
            'listing' => $listing
        ]);
    }

    // Render the Create a Listing <form> in listings/create.blade.php
    public function create() { // e.g. Action: create, Verb: GET, URI: /listings/create, Route Name: listings.create
        // $listing = \App\Models\Listing::pluck('id');
        // dd($listing);
        return view('listings.create');
    }

    // Store a new listing (submitting the previous create() <form> (HTML Form Submission) Or INSERT-ing a record for the first time)
    public function store(Request $request) { // e.g. Action: store, Verb: POST, URI: /listings, Route Name: listings.store
        // dd($request->all());
        // dd($request['logo']);
        // dd($request->logo);
        // dd($request->file('logo'));

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
            // 'logo'     => ['required', 'image']
        ]);
        // dd($formFields);



        // For File Upload (Uploading files) (using store() or storeAs() method, and the 'public' disk instead of Laravel's default disk 'local', and using the Symbolic Link by using the 'php artisan storage:link' command), check 2:45:14 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        if ($request->hasFile('logo')) { // check if there's an uploaded file with an <input> field " name='logo' " HTML attribute
            // Using Laravel's 'storage' directory instead of the traditional 'public' directory for storing user-uploaded files. Then we create a Symbolic Link (shortcut) between the 'public/storage' directory and 'storage/app/public' directory.
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // Add the uploaded file path (which is the `logo` column (in `listings` table) value to the already validated $formFields array i.e.    'logo' => 'filepath'    // store('logos', 'public') (    store($path, $disk)    )    will create a 'logos' folder, and store the uploaded files inside storage/app/public/logos    using the 'public' disk, as we changed the Default disk from 'local' to 'public' (    'root' => storage_path('app/public')    ) in config/filesystems.php file, so DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the uploaded files publicly accessible from the web!    // Note: The store($path, $disk) method will return the path of the file relative to the disk's root: https://laravel.com/docs/9.x/requests#storing-uploaded-files    AND    https://laravel.com/docs/9.x/filesystem#file-uploads    AND    https://laravel.com/docs/9.x/filesystem#specifying-a-disk
            // DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the user-uploaded files publicly accessible from the web!
        }
        // dd($formFields);



        // Persist (Enter) the `user_id` column of the `listings` table (which references the `id` of the `users` table) (Enter the user id of the user who is submitting the create a listing <form> (the user who is currently authenticated/logged in))
        $formFields['user_id'] = auth()->id(); // auth()->id()    is the `id` column of `users` table



        // For Mass Assignment with the create() method, and the $fillable and $guarded properties, check 2:21:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Mass Assignment: https://laravel.com/docs/9.x/eloquent#mass-assignment
        \App\Models\Listing::create($formFields); // INSERT the VALIDATED <input> values    // \App\Models\Listing::create($request->all()); IS VERY DANGEROUS!!
 
        // For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // For creating 'Flash Messages' and creating a special dedicated Blade Component file e.g. 'flash-message.blade.php' to display them using TWO ways, check 2:27:20 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // First way:
        // \Illuminate\Support\Facades\Session::flash('message', 'Listing Created!');

        // Second way:
        return redirect('/')->with('message', 'Listing created successfully!'); // redirect to the home page with a 'Flash Message'
    }

    // Render the Edit a Listing <form> in listings/edit.blade.php
    public function edit(\App\Models\Listing $listing) { // e.g. Action: edit, Verb: GET, URI: /listings/{listing}/edit, Route Name: listings.edit    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // {listing} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
        // dd($listing);

        return view('listings.edit', [ // passing data to view ('listing' will be used as variables in view) ($listing)
            'listing' => $listing
        ]);
    }

    // Update an already existing listing (submitting the previous edit() <form> Or UPDATE-ing an already existing record)
    public function update(Request $request, \App\Models\Listing $listing) { // e.g. Action: update, Verb: PUT/PATCH, URI: /listings/{listing}, Route Name: listings.update    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // {listing} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
        // dd($request->all());
        // dd($request['logo']);
        // dd($request->logo);
        // dd($request->file('logo'));



        // For Authorization (Example: You typically/usually want the logged in/authenticated user to be able to Edit or Delete their OWN posts ONLY, and not other users' posts), check 4:14:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // Authorization: https://laravel.com/docs/9.x/authorization
        // Make sure that the currently authenticated/logged in user is the OWNER of the listing (We want the authenticated/logged in user to be able to Edit or Delete their OWN listings ONLY, and not be able to Edit or Delete other users' listings)
        if ($listing->user_id != auth()->id()) { // if that listing doesn't belong to the currently authenticated user, prevent that user from being able to edit that listing (Or another way to go is using Laravel Policies (Authorization). Check my portfolio "Instagram Clone" project's ProfilePolicy.php class file.)    // if the listing's `user_id` (in `listings` table) is not the same as the currently authenticated/logged in `id` (in `users` table)
            abort(403, 'Unauthorized Action');
        }



        // Validation    // Writing The Validation Logic: https://laravel.com/docs/9.x/validation#quick-writing-the-validation-logic
        $formFields = $request->validate([
            // Validation Rules: What rules we want for certain <form> <input> fields
            'title'       => 'required',
            // 'company'     => ['required', \Illuminate\Validation\Rule::unique('listings', 'company')], // specifying the `company` column of the `listings` table to be UNIQUE    // Note: When you have more than one validation rule for a certain <form> <input> field, use an ARRAY. Also, when you have a complicated validation rule that requires several arguments, you may use the Rule class \Illuminate\Validation\Rule::YOUR_RULE     to fluently construct the rule. Check https://laravel.com/docs/9.x/validation#rule-dimensions     AND     Check 2:15:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            'company'     => 'required', // specifying the `company` column of the `listings` table to be UNIQUE    // Note: When you have more than one validation rule for a certain <form> <input> field, use an ARRAY. Also, when you have a complicated validation rule that requires several arguments, you may use the Rule class \Illuminate\Validation\Rule::YOUR_RULE     to fluently construct the rule. Check https://laravel.com/docs/9.x/validation#rule-dimensions     AND     Check 2:15:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            'location'    => 'required',
            'website'     => 'required',
            'email'       => ['required', 'email'],
            'tags'        => 'required',
            'description' => 'required'
            // 'logo'     => ['required', 'image']
        ]);
        // dd($formFields);



        // For File Upload (Uploading files) (using store() or storeAs() method, and the 'public' disk instead of Laravel's default disk 'local', and using the Symbolic Link by using the 'php artisan storage:link' command), check 2:45:14 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        if ($request->hasFile('logo')) { // check if there's an uploaded file with an <input> field " name='logo' " HTML attribute
            // Using Laravel's 'storage' directory instead of the traditional 'public' directory for storing user-uploaded files. Then we create a Symbolic Link (shortcut) between the 'public/storage' directory and 'storage/app/public' directory.
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // Add the uploaded file path (which is the `logo` column (in `listings` table) value to the already validated $formFields array i.e.    'logo' => 'filepath'    // store('logos', 'public') (    store($path, $disk)    )    will create a 'logos' folder, and store the uploaded files inside storage/app/public/logos    using the 'public' disk, as we changed the Default disk from 'local' to 'public' (    'root' => storage_path('app/public')    ) in config/filesystems.php file, so DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the uploaded files publicly accessible from the web!    // Note: The store($path, $disk) method will return the path of the file relative to the disk's root: https://laravel.com/docs/9.x/requests#storing-uploaded-files    AND    https://laravel.com/docs/9.x/filesystem#file-uploads    AND    https://laravel.com/docs/9.x/filesystem#specifying-a-disk
            // DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the uploaded files publicly accessible from the web!
        }
        // dd($formFields);



        // For Mass Assignment with the create() method, and the $fillable and $guarded properties, check 2:21:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // Mass Assignment: https://laravel.com/docs/9.x/eloquent#mass-assignment
        // \App\Models\Listing::create($formFields); // INSERT the VALIDATED <input> values    // \App\Models\Listing::create($request->all()); IS VERY DANGEROUS!!
        $listing->update($formFields); // UPDATE the VALIDATED <input> values    // \App\Models\Listing::create($request->all()); IS VERY DANGEROUS!!
 
        // For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // For creating 'Flash Messages' and creating a special dedicated Blade Component file e.g. 'flash-message.blade.php' to display them using TWO ways, check 2:27:20 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // First way:
        // \Illuminate\Support\Facades\Session::flash('message', 'Listing Created!');

        // Second way:
        // return redirect('/')->with('message', 'Listing created successfully!'); // redirect to the home page with a 'Flash Message'
        return back()->with('message', 'Listing updated successfully!'); // redirect back the last listings/edit.blade.php page with a 'Flash Message'
    }

    // Delete an already existing listing
    public function destroy(\App\Models\Listing $listing) { // e.g. Action: destroy, Verb: DELETE, URI: /listings/{listing}, Route Name: listings.delete    // Route Model Binding: https://laravel.com/docs/9.x/routing#route-model-binding    // Check 1:26:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // {listing} is a Route Parameters: https://laravel.com/docs/9.x/routing#route-parameters
        // For Authorization (Example: You typically/usually want the logged in/authenticated user to be able to Edit or Delete their OWN posts ONLY, and not other users' posts), check 4:14:00 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // Authorization: https://laravel.com/docs/9.x/authorization
        // Make sure that the currently authenticated/logged in user is an OWNER of the listing (We want the authenticated/logged in user to be able to Edit or Delete their OWN listings ONLY, and not be able to Edit or Delete other users' listings)
        if ($listing->user_id != auth()->id()) { // if the listing's `user_id` (in `listings` table) is not the same as the currently authenticated/logged in `id` (in `users` table)
            abort(403, 'Unauthorized Action');
        }



        $listing->delete();

        // For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // For creating 'Flash Messages' and creating a special dedicated Blade Component file e.g. 'flash-message.blade.php' to display them using TWO ways, check 2:27:20 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // First way:
        // \Illuminate\Support\Facades\Session::flash('message', 'Listing Created!');

        // Second way:
        return redirect('/')->with('message', 'Listing deleted successfully'); // redirect to the home page with a 'Flash Message'
    }

    // Render User Manage Listings page in listings/manage.blade.php (show the listings that ONLY BELONG to the currently logged in/authenticated user (not all listings) in order for him/her to manage his/her listings)
    public function manage() {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get() // passing data to view (passing the listings of the currently authenticated/logged in user ONLY to view (listings/manage.blade.php))
        ]);
    }

}
