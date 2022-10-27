<x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    
    {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
    <x-card class="p-10 max-w-lg mx-auto mt-24"> {{--    class="p-10"    is passed in to the Blade Component using Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}} {{-- Check 1:32:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}

    {{-- <div
        class="bg-gray-50 border border-gray-200 p-10 rounded"
    > --}}
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Gig
            </h2>
            <p class="mb-4">Edit: {{ $listing->title }}</p>
        </header>

        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data"> {{-- this will hit the put() method of the /listings/{listing} route to hit the update() method in ListingController.php --}} {{-- Whenever you have a file <input> field (file upload/uploading files), you must include the attribute    enctype="multipart/form-data" --}}
            @csrf {{-- To prevent this vulnerability, we need to inspect every incoming POST, PUT, PATCH, or DELETE request for a secret session value that the malicious application is unable to access --}} {{-- An Explanation Of The Vulnerability: https://laravel.com/docs/9.x/csrf#csrf-explanation --}}
            @method('PUT') {{-- HTML <form>-s can't make PUT, PATCH, or DELETE requests, so you need to add a hidden _method field to spoof these HTTP verbs, using @method() Blade directive --}} {{-- Method Field: https://laravel.com/docs/9.x/blade#method-field --}}

            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    value="{{ $listing->company }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    value="{{ $listing->title }}"
                    placeholder="Example: Senior Laravel Developer"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    value="{{ $listing->location }}"
                    placeholder="Example: Remote, Boston MA, etc"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ $listing->email }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{ $listing->website }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    value="{{ $listing->tags }}"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            {{-- For File Upload (Uploading files), check 2:45:14 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />

                {{-- show the logo image, if exists. If it doesn't, show a default image --}}
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" {{-- Conditional Ternary Operator: if there's an image, show it. But, if there isn't, show a default image --}} {{-- For File Upload (Uploading files) (using store() or storeAs() method, and the 'public' disk instead of Laravel's default disk 'local', and using the Symbolic Link by using the 'php artisan storage:link' command), check 2:45:14 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                    alt=""
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror                
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >
                    {{ $listing->description }}
                </textarea>

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>

    </x-card> {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}

</x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}