{{-- This Blade Component is used/included in components/layout.blade.php --}}

@if (session()->has('message'))
    {{-- Alpine.js ---- We included Alpine.js CDN in layout.blade.php --}} {{-- For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we used Alpine.js package --}}
    <div
        x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3"
    >

        {{ session('message') }}

    </div>
@endif