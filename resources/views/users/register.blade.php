<x-layout> 

    {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}}
    {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
    <x-card class="p-10 max-w-lg mx-auto mt-24"> {{--    class="p-10"    is passed in to the Blade Component using Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}}



        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to post jobs</p>
        </header>

        <form method="POST" action="/users">  {{-- this will hit the post() method of the /users route to hit the store() method in UserController.php --}}
            @csrf


            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{ old('name') }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email') }}"
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
                    name="password" {{-- Note: You must stick to that 'x_confirmation' naming convention in order for the validation rule to work! Check the store() method in UserController! --}}
                    value="{{ old('password') }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password2"
                    class="inline-block text-lg mb-2"
                >
                    Confirm Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation" {{-- Note: You must stick to that 'x_confirmation' naming convention in order for the validation rule to work! Check the store() method in UserController! --}}
                    value="{{ old('password_confirmation') }}"
                />

                {{-- Displaying the Validation Errors using @error @enderror Blade directive --}}
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> {{-- Tailwind CSS classes --}} {{-- $message is a predefined error message by Laravel and changes according to the Validation Rules you have specified in the store() method in the ListingController --}}
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="/login" class="text-laravel"
                        >Login</a
                    >
                </p>
            </div>
        </form>

    </x-card>

</x-layout> 