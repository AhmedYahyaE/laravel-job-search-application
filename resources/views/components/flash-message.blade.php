{{-- This Blade Component is used/included in components/layout.blade.php --}}
{{-- For creating 'Flash Messages' and creating a special Blade Component file e.g. 'flash-message.blade.php' to display them using TWO ways, check 2:27:20 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}

{{-- Determining If An Item Exists In The Session: https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
@if (session()->has('message'))
    {{-- Alpine.js ---- We included Alpine.js CDN in layout.blade.php --}} {{-- For removing a 'Flash Message' after a certain amount of time (to make it disappear after a certain amount of time), we use Alpine.js package. Check 2:32:45 in https://www.youtube.com/watch?v=MYyJ4PuL4pY --}}
    <div
        x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3"
    >

        {{ session('message') }}

    </div>
@endif