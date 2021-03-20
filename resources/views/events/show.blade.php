<x-app-layout>
    @section('title', $event->title)
    @section('url', route('events.show', ['event' => $event->id]))
    @section('description', $event->description)
    @section('author', $event->organizer->name)

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($event->title) }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <p class="text-2xl py-4 px-2"><i class="fas fa-info mr-2"></i> Event Details</p>
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 py-2 mb-3 border-b">
                        <p class="col-span-1"><i class="fas fa-map-marker-alt mr-2"></i> {{ $event->venue }}</p>
                        <p class="col-span-1"><i class="fas fa-flag text-green-600 mr-2"></i>
                            {{ $event->start->toDayDateTimeString() }}</p>
                        <p class="col-span-1"><i class="fas fa-flag-checkered mr-2"></i>
                            {{ $event->end->toDayDateTimeString() }}</p>
                    </div>
                    
                    <p>{{ $event->description }}</p>
                </div>
            </div>

            <div>
                <p class="text-2xl py-4 px-2"><i class="fas fa-user-tie mr-2"></i> Event Organizer</p>
                <div class="flex bg-white rounded-lg shadow p-4 gap-4 items-center">
                    <img src="{{ $event->organizer->profile_photo_url }}" alt="{{ $event->organizer->name }}"
                        class="rounded-full">
                    <div>
                        <p class="text-xl">{{ $event->organizer->name }}</p>
                        <p class="text-sm text-gray-500">{{ $event->organizer->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>