<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mx-auto">
                @foreach ($projects as $project)
                <a href="#">
                    <div class="col-span-1 bg-white rounded-lg shadow hover:shadow-lg">
                        <img src="https://picsum.photos/id/{{ $project->id }}/300/200" alt="{{ $project->title }}" class="rounded-t-lg">
                        <div class="p-4">
                            <p class="text-lg">{{ $project->title }}</p>
                            <p class="text-sm text-gray-500">{{ $project->lead->name }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>