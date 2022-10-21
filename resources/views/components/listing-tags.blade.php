{{-- Category Tags like 'laravel' tag, 'Vue' tag, 'API' tag, ... --}} {{-- this Blade Component is used (rendered) in listing-card.blade.php and listing.blade.php (listings/show.blade.php) --}}

{{-- Blade Component: https://laravel.com/docs/9.x/blade#components --}} {{-- Check 1:28:17 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
{{-- Data Properties / Attributes (using the @props Blade directive): https://laravel.com/docs/9.x/blade#data-properties-attributes --}}
@props(['tagsCsv']) {{-- 'tagsCsv' means Comma-Separated Value list --}} {{-- the array of variables that our Blade Component uses ($tagsCsv), that were passed from listing-card.blade.php --}}


@php
    $tags = explode(',', $tagsCsv); // convert string to array
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a> {{-- When a tag is clicked (using the <a> HTML element and Query String Parameters), filter the listings by that tag --}}
        </li>
    @endforeach
</ul>