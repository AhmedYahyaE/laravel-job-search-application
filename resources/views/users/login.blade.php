<x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}



    {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
    <x-card class="p-10 max-w-lg mx-auto mt-24"> {{--    class="p-10"    is passed in to the Blade Component using Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}} {{-- Check 1:32:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}



        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Log into your account to post gigs</p>
        </header>

        <form method="POST" action="/users/authenticate">  {{-- this will hit the post() method of the /users/login route to hit the authenticate() method in UserController.php --}}
            @csrf {{-- To prevent this vulnerability, we need to inspect every incoming POST, PUT, PATCH, or DELETE request for a secret session value that the malicious application is unable to access --}} {{-- An Explanation Of The Vulnerability: https://laravel.com/docs/9.x/csrf#csrf-explanation --}}


            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email') }}" {{-- Repopulating Forms: https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password" {{-- Note: You must stick to that 'x_confirmation' naming convention in order for the validation rule to work! Check the store() method in UserController! For Password and Password Confirmation validation rules, check 'confirmed': https://laravel.com/docs/9.x/validation#rule-confirmed     AND     check 3:23:54 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                    value="{{ old('password') }}" {{-- Repopulating Forms: https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel"
                        >Register</a
                    >
                </p>
            </div>
        </form>



    </x-card> {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}



</x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}