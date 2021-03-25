@props(['active', 'icon'])

@php
$classes = ($active ?? false)
? 'bg-blue-50 hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-center py-3 px-4 space-x-2
rounded-lg font-bold'
: 'bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-center py-3 px-4 space-x-2
rounded-lg font-bold text-opacity-70 hover:text-opacity-100';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    <i class="{{ $icon }} text-lg text-blue-600"></i>
    <span class="flex-1">
        {{ $slot }}
    </span>
</a>