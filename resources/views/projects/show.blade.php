<x-app-layout>
    @section('title', $project->title)
    @section('url', route('projects.show', ['project' => $project->id]))
    @section('description', $project->description)
    @section('author', $project->lead->name)

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($project->title) }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <p class="text-2xl py-4 px-2"><i class="fas fa-info mr-2"></i> Project Details</p>
                <div class="bg-white rounded-lg shadow p-4">                    
                    <p>{{ $project->description }}</p>
                </div>
            </div>

            <div class="mb-4">
                <p class="text-2xl py-4 px-2"><i class="fas fa-user-tie mr-2"></i> Project Lead</p>
                <div class="flex bg-white rounded-lg shadow p-4 gap-4 items-center">
                    <img src="{{ $project->lead->profile_photo_url }}" alt="{{ $project->lead->name }}"
                        class="rounded-full">
                    <div>
                        <p class="text-xl">{{ $project->lead->name }}</p>
                        <p class="text-sm text-gray-500">{{ $project->lead->email }}</p>
                    </div>
                </div>
            </div>

            @if ($project->url && count($project->open_graph ?? []))
            <a href="{{ $project->url }}">
                <p class="text-2xl py-4 px-2"><i class="fas fa-home mr-2"></i> Project Homepage</p>
                <div class="bg-white rounded-lg shadow hover:shadow-lg flex items-center">
                    <img src="{{ $project->open_graph['image'] }}"
                        alt="{{ $project->open_graph['image:alt'] ?? $project->open_graph['title'] }}"
                        class="rounded-lg h-20">
                    <div class="ml-4">
                        <p>{{ $project->open_graph['title'] }}</p>
                        <p class="text-xs text-gray-500">{{ $project->open_graph['url'] }}</p>
                        <p class="text-sm text-gray-700">{{ $project->open_graph['description'] }}</p>
                    </div>
                </div>
            </a>
            @endif
        </div>
    </div>
</x-app-layout>