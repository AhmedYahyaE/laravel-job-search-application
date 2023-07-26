{{-- Manage User Listings page --}}



{{-- @extends('layout') --}}
<x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
{{-- @section('content') --}}



    {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
    <x-card class="p-10"> {{--    class="p-10"    is passed in to the Blade Component using Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}} {{-- Check 1:32:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    {{-- <div class="bg-gray-50 border border-gray-200 p-10 rounded"> --}}

        

        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Jobs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>



                {{-- @unless (count($listings) == 0) --}}
                @unless ($listings->isEmpty()) {{-- isEmpty(): https://laravel.com/docs/9.x/collections#method-isempty --}}
                    @foreach ($listings as $listing) {{-- $listings are the listings of the currently authenticated/logged in user ONLY --}}



                        <tr class="border-gray-300">
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a href="show.html">
                                    {{ $listing->title }}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a
                                    href="/listings/{{ $listing->id }}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                    ><i
                                        class="fa-solid fa-pen-to-square"
                                    ></i>
                                    Edit</a
                                >
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >


                                {{-- Fore the Delete functionality, check 3:09:15 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                                <form method="POST" action="/listings/{{ $listing->id }}"> {{-- this will hit the delete() method of the /listings/{listing} route to hit the destroy() method in ListingController.php --}}
                                    @csrf {{-- To prevent this vulnerability, we need to inspect every incoming POST, PUT, PATCH, or DELETE request for a secret session value that the malicious application is unable to access --}} {{-- An Explanation Of The Vulnerability: https://laravel.com/docs/9.x/csrf#csrf-explanation --}}
                                    @method('DELETE') {{-- HTML <form>-s can't make PUT, PATCH, or DELETE requests, so you need to add a hidden _method field to spoof these HTTP verbs, using @method() Blade directive --}} {{-- Method Field: https://laravel.com/docs/9.x/blade#method-field --}}

                                    <button class="text-red-500">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>


                            </td>
                        </tr>



                    @endforeach
                @else {{-- if there're no any listings for the currently authenticated/logged in user --}}

                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No Listings Found</p>
                        </td>
                    </tr>

                @endunless



            </tbody>
        </table>



    </x-card> {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}



{{-- @endsection --}}
</x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}