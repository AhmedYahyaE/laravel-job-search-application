<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
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
        // 'Scope Filtering' of tags (the <a> HTML element in components/listing-tags.blade.php) and the Search Bar <form> in partials/_search.blade.php (which utilizes 'Query Scopes' (Local Scopes or Dynamic Scopes))
        // Query Scopes: https://laravel.com/docs/9.x/eloquent#query-scopes    // Local Scopes: https://laravel.com/docs/9.x/eloquent#local-scopes    // Dynamic Scopes: https://laravel.com/docs/9.x/eloquent#dynamic-scopes
        return view('listings.index', [ // passing data to view (will be used as variables in view) ('heading', 'listings')
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6) // we call the scopeFilter() method in the Listing.php model    // we pass in 'tag' and 'search' as an ARRAY (where 'tag' comes from the <a> in components/listing-tags.blade.php, and 'search' comes from the search <form> in partials/_search.blade.php)
        ]);
    }

    // Show a SINGLE listing in listings/show.blade.php
    public function show(Listing $listing) { // e.g. Action: show, Verb: GET, URI: /listings/{listing}, Route Name: listings.show
        // dd($listing);

        return view('listings.show', [ // passing data to view (will be used as variables in view) ('listing')
            'listing' => $listing
        ]);
    }

    // Render the Create a Listing <form> in listings/create.blade.php
    public function create() {
        return view('listings.create');
    }

    // Store a new listing (submitting the previous create() <form> (HTML Form Submission)
    public function store(Request $request) {
        // Validation
        $formFields = $request->validate([
            'title'       => 'required',
            'company'     => ['required', \Illuminate\Validation\Rule::unique('listings', 'company')],
            'location'    => 'required',
            'website'     => 'required',
            'email'       => ['required', 'email'],
            'tags'        => 'required',
            'description' => 'required'
        ]);
        // dd($formFields);

        // For File Upload (Uploading files) (using store() or storeAs() method, and the 'public' disk instead of Laravel's default disk 'local', and using the Symbolic Link by using the 'php artisan storage:link' command)
        if ($request->hasFile('logo')) { // check if there's an uploaded file with an <input> field " name='logo' " HTML attribute
            // Using Laravel's 'storage' directory instead of the traditional 'public' directory for storing user-uploaded files. Then we create a Symbolic Link (shortcut) between the 'public/storage' directory and 'storage/app/public' directory.
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // Add the uploaded file path (which is the `logo` column (in `listings` table) value to the already validated $formFields array i.e.    'logo' => 'filepath'    // store('logos', 'public') (    store($path, $disk)    )    will create a 'logos' folder, and store the uploaded files inside storage/app/public/logos    using the 'public' disk, as we changed the Default disk from 'local' to 'public' (    'root' => storage_path('app/public')    ) in config/filesystems.php file, so DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the uploaded files publicly accessible from the web!    // Note: The store($path, $disk) method will return the path of the file relative to the disk's root: https://laravel.com/docs/9.x/requests#storing-uploaded-files    AND    https://laravel.com/docs/9.x/filesystem#file-uploads    AND    https://laravel.com/docs/9.x/filesystem#specifying-a-disk
            // DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the user-uploaded files publicly accessible from the web!
        }
        // dd($formFields);

        // Persist (Enter) the `user_id` column of the `listings` table (which references the `id` of the `users` table) (Enter the user id of the user who is submitting the create a listing <form> (the user who is currently authenticated/logged in))
        $formFields['user_id'] = auth()->id(); // auth()->id()    is the `id` column of `users` table

        // For Mass Assignment with the create() method, and the $fillable and $guarded properties
        Listing::create($formFields); // INSERT the VALIDATED <input> values
 

        return redirect('/')->with('message', 'Listing created successfully!'); // redirect to the home page with a 'Flash Message'
    }

    // Render the Edit a Listing <form> in listings/edit.blade.php
    public function edit(Listing $listing) {
        // dd($listing);

        return view('listings.edit', [ // passing data to view ('listing' will be used as variables in view) ($listing)
            'listing' => $listing
        ]);
    }

    // Update an already existing listing (submitting the previous edit() <form> Or UPDATE-ing an already existing record)
    public function update(Request $request, Listing $listing) {
        // Make sure that the currently authenticated/logged in user is the OWNER of the listing (We want the authenticated/logged in user to be able to Edit or Delete their OWN listings ONLY, and not be able to Edit or Delete other users' listings)
        if ($listing->user_id != auth()->id()) { // if that listing doesn't belong to the currently authenticated user, prevent that user from being able to edit that listing (Or another way to go is using Laravel Policies (Authorization)
            abort(403, 'Unauthorized Action');
        }


        // Validation
        $formFields = $request->validate([
            'title'       => 'required',
            'company'     => 'required',
            'location'    => 'required',
            'website'     => 'required',
            'email'       => ['required', 'email'],
            'tags'        => 'required',
            'description' => 'required'
        ]);
        // dd($formFields);


        // For File Upload (Uploading files) (using store() or storeAs() method, and the 'public' disk instead of Laravel's default disk 'local', and using the Symbolic Link by using the 'php artisan storage:link' command)
        if ($request->hasFile('logo')) { // check if there's an uploaded file with an <input> field " name='logo' " HTML attribute
            // Using Laravel's 'storage' directory instead of the traditional 'public' directory for storing user-uploaded files. Then we create a Symbolic Link (shortcut) between the 'public/storage' directory and 'storage/app/public' directory.
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // Add the uploaded file path (which is the `logo` column (in `listings` table) value to the already validated $formFields array i.e.    'logo' => 'filepath'    // store('logos', 'public') (    store($path, $disk)    )    will create a 'logos' folder, and store the uploaded files inside storage/app/public/logos    using the 'public' disk, as we changed the Default disk from 'local' to 'public' (    'root' => storage_path('app/public')    ) in config/filesystems.php file, so DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the uploaded files publicly accessible from the web!    // Note: The store($path, $disk) method will return the path of the file relative to the disk's root: https://laravel.com/docs/9.x/requests#storing-uploaded-files    AND    https://laravel.com/docs/9.x/filesystem#file-uploads    AND    https://laravel.com/docs/9.x/filesystem#specifying-a-disk
            // DON'T FORGET to create the SYMBOLIC LINK using the 'php artisan storage:link' command to make the uploaded files publicly accessible from the web!
        }
        // dd($formFields);


        // For Mass Assignment with the create() method, and the $fillable and $guarded properties
        $listing->update($formFields); // UPDATE the VALIDATED <input> values
 

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete an already existing listing
    public function destroy(Listing $listing) {
        // Make sure that the currently authenticated/logged in user is an OWNER of the listing (We want the authenticated/logged in user to be able to Edit or Delete their OWN listings ONLY, and not be able to Edit or Delete other users' listings)
        if ($listing->user_id != auth()->id()) { // if the listing's `user_id` (in `listings` table) is not the same as the currently authenticated/logged in `id` (in `users` table)
            abort(403, 'Unauthorized Action');
        }


        $listing->delete();


        return redirect('/')->with('message', 'Listing deleted successfully'); // redirect to the home page with a 'Flash Message'
    }

    // Render User Manage Listings page in listings/manage.blade.php (show the listings that ONLY BELONG to the currently logged in/authenticated user (not all listings) in order for him/her to manage his/her listings)
    public function manage() {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }

}