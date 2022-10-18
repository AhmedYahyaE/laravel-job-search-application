<!-- <h1><?php // echo $heading ?></h1> --> <!-- $heading is passed from the view() method in web.php  -->
<h1>{{ $heading }}</h1>                     <!-- $heading is passed from the view() method in web.php  -->

@unless (count($listings) == 0) {{-- @unless is like    @if NOT    --}}
    <!-- <?php // foreach ($listings as $listing): ?> --> <!-- $listings is passed from the view() method in web.php  -->
    @foreach ($listings as $listing)                      <!-- $listings is passed from the view() method in web.php  -->
        <!-- <h2><?php // echo $listing['title'] ?></h2> -->
        <h2>{{ $listing['title'] }}</h2>
        <!-- <p><?php // echo $listing['description'] ?></p> -->
        <p>{{ $listing['description'] }}</p>
        <!-- <?php // endforeach ?> -->
    @endforeach
@endunless


@php
    // $test = 7;
@endphp
{{-- {{ $test }} --}}