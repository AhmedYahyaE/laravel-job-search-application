{{-- The ALL listings page --}}
<x-layout> 

        {{-- Include the Hero Image --}}
        @include('partials._hero')



        {{-- Include the Search Bar --}}
        @include('partials._search')



        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

            @unless (count($listings) == 0) {{-- @unless is like    @if NOT    --}}
                @foreach ($listings as $listing) <!-- $listings is passed from the view() method in web.php  -->
                    <x-listing-card :listing="$listing"/> {{-- passing $listing to the Blade Component (listing-card.blade.php) --}} {{-- Passing Data To Components: https://laravel.com/docs/9.x/blade#passing-data-to-components --}}
                @endforeach
            @else
                <p>No listings found</p>
            @endunless

        </div>


        <div class="mt-6 p-4">
            {{ $listings->links() }} {{-- Pagination --}}
        </div>

</x-layout> 