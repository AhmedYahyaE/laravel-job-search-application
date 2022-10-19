@extends('layout')


@section('content')
    {{-- Include the Hero Image --}}
    @include('partials._hero')



    {{-- Include the Search Bar --}}
    @include('partials._search')



    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @php
            // dd($listings);
            // foreach ($listings as $key => $listing) {
            //     dd($listing);
            // }
        @endphp
        @unless (count($listings) == 0) {{-- @unless is like    @if NOT    --}}
            @foreach ($listings as $listing) <!-- $listings is passed from the view() method in web.php  -->

                {{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                <!-- Item -->
                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="{{ asset('images/no-image.png') }}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                            <ul class="flex">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }},
                                MA
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No listings found</p>
        @endunless

    </div>
@endsection