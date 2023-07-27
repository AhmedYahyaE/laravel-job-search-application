<x-layout>

    {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
    <x-card class="p-10 max-w-lg mx-auto mt-24"> {{--    class="p-10"    is passed in to the Blade Component using Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}}

        {{-- <div
            class="bg-gray-50 border border-gray-200 p-10 rounded"
        > --}}
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Job
            </h2>
            <p class="mb-4">Post a job to find a developer</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data"> {{-- this will hit the post() method of the /listings route to hit the store() method in ListingController.php --}}
            @csrf


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
                    value="{{ old('company') }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
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
                    value="{{ old('title') }}"
                    placeholder="Example: Senior Laravel Developer"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
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
                    value="{{ old('location') }}"
                    placeholder="Example: Remote, Boston MA, etc"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
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
                    value="{{ old('email') }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
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
                    value="{{ old('website') }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
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
                    value="{{ old('tags') }}"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
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
                    {{ old('description') }}
                </textarea>

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}}
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Create Job
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>

    </x-card>

</x-layout>