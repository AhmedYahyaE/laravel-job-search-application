{{-- The Single Listing Page --}} {{-- this page is opened from the <a> anchor link elements in listing-card.blade.php. $listing is passed from the route in web.php or the controller --}}
@extends('layout')


@section('content')
    {{-- Include the Search Bar --}}
    @include('partials._search')



    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">

        {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
        {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
        <x-card class="p-10"> {{--    class="p-10"    is passed in to the Blade Component using Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}} {{-- Check 1:32:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}

            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ asset('images/no-image.png') }}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3> {{-- $listing is passed from the controller --}}
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>



                {{-- Category Tags like 'laravel' tag, 'Vue' tag, 'API' tag, ... --}}
                {{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                <x-listing-tags :tagsCsv="$listing->tags" /> {{-- passing $listing->tags ($listing was passed to here from the controller) to the Blade Component (listing-tags.blade.php) --}} {{-- Passing Data To Components: https://laravel.com/docs/9.x/blade#passing-data-to-components --}}


                
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p> {{ $listing->description }} </p>

                        <a
                            href="mailto:{{ $listing->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href="{{ $listing->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>

        </x-card> {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    </div>
@endsection