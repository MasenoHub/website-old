@props(['title', 'icon', 'value'])

<div class="col-span-1 bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6">
    <h2 class="text-xl text-blue-900 font-bold mb-4 lg:mb-6">{{ $title }}</h2>
    <div class="flex space-x-4 items-end mb-4 lg:mb-6">
        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
            <i class="{{ $icon }} text-blue-500 text-2xl"></i>
        </div>
        <span class="text-2xl mb-2 text-blue-900">{{ $value }}</span>
    </div>
</div>