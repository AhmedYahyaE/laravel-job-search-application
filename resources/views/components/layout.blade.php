{{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />



        {{-- Alpine.js --}} {{-- For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
        <script src="//unpkg.com/alpinejs" defer></script>



        <script src="https://cdn.tailwindcss.com"></script> {{-- Tailwind CSS --}}
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                {{-- To remove the 'Register' and 'Login' links from the website view and show 'Logout' link when there's a logged in user (after logging in), because the presence of 'Register' or 'Login' wouldn't make sense if the user is already logged in, Check 3:29:34 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                {{-- Authentication Directives (@auth @endauth or specifying the authentication guard like @auth('the_authentication_guard') and @guest @endguest or specifying the authentication guard like @guest('the_authentication_guard')): https://laravel.com/docs/9.x/blade#authentication-directives --}} 
                @auth {{-- Authentication Directives: https://laravel.com/docs/9.x/blade#authentication-directives --}}

                    <li>
                        <span class="font-bold uppercase">
                            Welcome {{ auth()->user()->name }} {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                        </span>
                    </li>
                    <li>
                        <a href="/listings/manage" class="hover:text-laravel"
                            ><i class="fa-solid fa-gear"></i>
                            Manage Listings</a
                        >
                    </li>
                    <li>
                        <form class="inline" method="POST" action="logout"> {{-- this will hit the post() method of the /logout route to hit the logout() method in UserController.php --}}
                            @csrf {{-- To prevent this vulnerability, we need to inspect every incoming POST, PUT, PATCH, or DELETE request for a secret session value that the malicious application is unable to access --}} {{-- An Explanation Of The Vulnerability: https://laravel.com/docs/9.x/csrf#csrf-explanation --}}


                            <button type="submit">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>

                @else {{-- Note: the @guest @endguest Blade directive could be used here instead of @else!! -- If the user is not authenticated i.e. the user is a guest --}}
                    
                    <li>
                        <a href="/register" class="hover:text-laravel"
                            ><i class="fa-solid fa-user-plus"></i> Register</a
                        >
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a
                        >
                    </li>

                @endauth

            </ul>
        </nav>


    
        {{-- VIEW OUTPUT --}}
        <main>
            {{-- @yield('content') --}}

            {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
            {{ $slot }}

        </main>
        {{-- VIEW OUTPUT --}}



        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="/listings/create"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Job</a
            >
        </footer>


        {{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
        <x-flash-message /> {{-- passing $listing to the Blade Component (listing-card.blade.php) --}} {{-- Passing Data To Components: https://laravel.com/docs/9.x/blade#passing-data-to-components --}}

    </body>
</html>