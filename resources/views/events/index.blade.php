<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Calendar') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg bg-white p-4">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const events = [];

            @foreach ($events as $event)
                events.push({
                    id: @json($event->id),
                    title: @json($event->title),
                    start: @json($event->start),
                    end: @json($event->end),
                    allDay: false,
                    url: @json(route('events.show', ['event' => $event->id])),

                    extendedProps: {
                        venue: @json($event->venue),
                        description: @json($event->description),
                        organizer: @json($event->organizer->name)
                    }
                });
            @endforeach
    </script>
    <script src="{{ mix('js/events.js') }}" defer></script>
    @endpush
</x-app-layout>