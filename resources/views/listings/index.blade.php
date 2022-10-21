{{-- The ALL listings page --}}


{{-- @extends('layout') --}}
<x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}

{{-- @section('content') --}}
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
                {{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
                <x-listing-card :listing="$listing"/> {{-- passing $listing to the Blade Component (listing-card.blade.php) --}} {{-- Passing Data To Components: https://laravel.com/docs/9.x/blade#passing-data-to-components --}}
            @endforeach
        @else
            <p>No listings found</p>
        @endunless
    </div>
{{-- @endsection --}}
</x-layout> {{-- For using 'layout.blade.php' as a Blade Component, check 1:46:43 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}