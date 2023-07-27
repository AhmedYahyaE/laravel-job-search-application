{{-- This Blade Component is used/included in listings/index.blade.php and other various files --}}
{{-- this Blade Component is used (rendered) in listings.blade.php (listings/index.blade.php) --}}
{{-- Data Properties / Attributes (using the @props Blade directive): https://laravel.com/docs/9.x/blade#data-properties-attributes --}}
@props(['listing']) {{-- the array of variables that our Blade Component uses ($listing), that were passed in from listings.blade.php (listings/index.blade.php) --}}


<!-- Item -->
{{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}}
<x-card>

    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" {{-- Conditional Ternary Operator: if there's an image, show it. But, if there isn't, show a default image --}}
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a> {{-- Go to listing.blade.php (listings/show.blade.php) --}}
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>



            {{-- Category Tags like 'laravel' tag, 'Vue' tag, 'API' tag, ... --}}
            {{-- Rendering Components: https://laravel.com/docs/9.x/blade#rendering-components --}}
            <x-listing-tags :tagsCsv="$listing->tags"/> {{-- passing $listing->tags to the Blade Component (listing-tags.blade.php) --}} {{-- Passing Data To Components: https://laravel.com/docs/9.x/blade#passing-data-to-components --}}



            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>

</x-card>