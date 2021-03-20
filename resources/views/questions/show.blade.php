<x-app-layout>
    @section('title', $question->title)
    @section('url', route('questions.show', ['question' => $question->id]))
    {{-- TODO Brief summary here --}}
    {{-- @section('description', $question->summary) --}}
    @section('author', $question->author->name)
    @section('og:type', 'article')

    @section('meta:og')
        @parent
        {{-- TODO published_at --}}
        <meta property="article:published_time" content="{{ $question->created_at->toIso8601String() }}">
        <meta property="article:modified_time" content="{{ $question->updated_at->toIso8601String() }}">
        <meta property="article:expiration_time" content="{{ $question->deleted_at?->toIso8601String() }}">

        {{-- TODO Profiles --}}
        {{-- <meta property="article:author" content=""> --}}
        
        {{-- TODO Categories, Tags --}}
        {{-- <meta property="article:section" content="{{ $question->category }}">
        @foreach ($article->tags as $tag)
            <meta property="article:tag" content="{{ $tag->name }}">
        @endforeach --}}
    @endsection

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Q&A') }}
            </h2>
            @auth
            <a href="{{ route('questions.new') }}" class="text-sm px-4 py-2 rounded-lg hover:shadow -my-4">
                <i class="fas fa-plus mr-2"></i> Ask a Question
            </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="prose prose-indigo max-w-none my-2">
                        <h1 class="font-extralight px-4">{{ $question->title }}</h1>
                        <div id="body" class="py-4">
                            <div class="text-center">
                                <i class="fas fa-circle-notch fa-spin fa-lg"></i>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                        <div class="col-span-1 col-start-1 md:col-start-3 lg:col-start-4">
                            <p class="text-xs">Asked by:</p>
                            <div class="flex rounded-lg bg-gray-50 p-2">
                                <img src="{{ $question->author->profile_photo_url }}"
                                    alt="{{ $question->author->name }}" class="h-10 rounded-full">
                                <div class="ml-4">
                                    <a href="#" class="text-sm hover:underline">{{ $question->author->name }}</a>
                                    <p class="text-xs text-gray-500">{{ $question->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-2xl p-2 mb-6 border-b">{{ $question->answers->count() }} Answers </p>

            @foreach ($question->answers as $answer)
            <div class="mb-4">

                <div class="bg-white rounded-lg shadow p-4 gap-4 items-center">
                    <p>{{ $answer->text}} </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                        <div class="col-span-1 col-start-1 md:col-start-3 lg:col-start-4">
                            <p class="text-xs">Answered by:</p>
                            <div class="flex rounded-lg bg-gray-50 p-2">
                                <img src="{{ $answer->author->profile_photo_url }}" alt="{{ $answer->author->name }}"
                                    class="h-10 rounded-full">
                                <div class="ml-4">
                                    <a href="#" class="text-sm hover:underline">{{ $answer->author->name }}</a>
                                    <p class="text-xs text-gray-500">{{ $answer->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
    <script>
        const body = @json($question->body);
    </script>
    <script src="{{ mix("js/questions/show.js") }}" defer></script>
    @endpush
</x-app-layout>