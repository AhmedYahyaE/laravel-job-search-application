{{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- this Blade Component is used (rendered) in listings.blade.php (listings/index.blade.php) --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
{{-- Data Properties / Attributes (using the @props Blade directive): https://laravel.com/docs/9.x/blade#data-properties-attributes --}}
@props(['listing']) {{-- the array of variables that our Blade Component uses ($listing), that were passed from listings.blade.php (listings/index.blade.php) --}}


<!-- Item -->
{{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
<x-card>

    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ asset('images/no-image.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a> {{-- Go to listing.blade.php (listings/show.blade.php) --}}
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>



            {{-- Category Tags like 'laravel' tag, 'Vue' tag, 'API' tag, ... --}}
            {{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
            <x-listing-tags :tagsCsv="$listing->tags"/> {{-- passing $listing->tags to the Blade Component (listing-tags.blade.php) --}} {{-- Passing Data To Components: https://laravel.com/docs/9.x/blade#passing-data-to-components --}}



            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }},
                MA
            </div>
        </div>
    </div>

</x-card> {{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}} {{-- check 1:30:25 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}