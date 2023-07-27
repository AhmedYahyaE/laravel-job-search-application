{{-- This Blade Component is used (rendered) in listing-card.blade.php --}}
{{-- Slots (Blade Components Slots): https://laravel.com/docs/9.x/blade#slots --}}
{{-- <div class="bg-gray-50 border border-gray-200 rounded p-6"> --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}> {{-- Default / Merged Attributes: https://laravel.com/docs/9.x/blade#default-merged-attributes --}} {{-- Component Attributes: https://laravel.com/docs/9.x/blade#component-attributes --}}
    {{ $slot }}
</div>