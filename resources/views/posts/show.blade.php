<x-app-layout>
    @section('title', $post->title)
    @section('url', route('posts.show', ['post' => $post->id]))
    @section('description', $post->summary)
    @section('author', $post->author->name)
    @section('og:type', 'article')

    @section('meta:og')
    @parent
    {{-- TODO published_at --}}
    <meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
    <meta property="article:expiration_time" content="{{ $post->deleted_at?->toIso8601String() }}">

    {{-- TODO Profiles --}}
    {{-- <meta property="article:author" content=""> --}}

    {{-- TODO Categories, Tags --}}
    {{-- <meta property="article:section" content="{{ $post->category }}">
    @foreach ($article->tags as $tag)
    <meta property="article:tag" content="{{ $tag->name }}">
    @endforeach --}}
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maseno Hub Blog') }}
        </h2>
        {{-- <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div> --}}
    </x-slot>

    <div class="container w-full md:max-w-3xl mx-auto pt-20">
        <div class="w-full text-xl text-gray-800 leading-normal">
            <div class="font-sans px-4">
                <a href="{{ route('posts.index') }}"
                    class="text-base md:text-sm text-indigo-500 font-bold hover:underline uppercase">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Blog
                </a>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    {{ $post->title }}
                </h1>
                <p class="text-sm md:text-base font-normal text-gray-600">
                    Last updated on {{ $post->updated_at->toFormattedDateString() }}
                </p>
            </div>

            <div id="body" class="py-8 prose prose-indigo max-w-none">
                <div class="text-center">
                    <i class="fas fa-circle-notch fa-spin fa-lg"></i>
                </div>
            </div>
        </div>

        <!--Tags -->
        {{-- <div class="text-base md:text-sm text-gray-500 px-4 py-6">
            Tags: <a href="#" class="text-base md:text-sm text-indigo-500 no-underline hover:underline">Link</a> . <a
                href="#" class="text-base md:text-sm text-indigo-500 no-underline hover:underline">Link</a>
        </div> --}}

        <hr class="border-b-2 border-gray-400 my-4 mx-4">

        {{-- TODO: Subscribe CTA --}}

        <div class="flex w-full items-center font-sans px-4 py-12">
            <img class="w-10 h-10 rounded-full mr-4" src="{{ $post->author->profile_photo_url }}"
                alt="{{ $post->author->name }}">
            <div class="flex-1 px-2">
                <p class="text-base font-bold md:text-xl leading-none mb-2">{{ $post->author->name }}</p>
                <p class="text-gray-600 text-xs md:text-base uppercase">{{ $post->author->role }}</p>
            </div>
            <div class="justify-end">
                <a href="#"
                    class="bg-transparent border border-gray-500 hover:border-indigo-500 text-xs text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">
                    My Posts
                </a>
            </div>
        </div>

        <hr class="border-b-2 border-gray-400 my-4 mx-4">

        <div class="font-sans flex justify-between content-center px-4 pb-12">
            <div class="text-left">
                @if($post->newer)
                <span class="text-xs md:text-sm font-normal text-gray-600">
                    <i class="fas fa-chevron-left mr-2"></i> Newer Post
                </span><br>
                <p>
                    <a href="{{ route('posts.show', ['post' => $post->newer->id]) }}"
                        class="break-normal text-base md:text-sm text-indigo-500 font-bold no-underline hover:underline">
                        {{ $post->newer->title }}
                    </a>
                </p>
                @endif
            </div>

            <div class="text-right">
                @if($post->older)
                <span class="text-xs md:text-sm font-normal text-gray-600">
                    Older Post <i class="fas fa-chevron-right ml-2"></i>
                </span><br>
                <p>
                    <a href="{{ route('posts.show', ['post' => $post->older->id]) }}"
                        class="break-normal text-base md:text-sm text-indigo-500 font-bold no-underline hover:underline">
                        {{ $post->older->title }}
                    </a>
                </p>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const body = @json($post->body);
    </script>
    <script src="{{ mix("js/posts/show.js") }}" defer></script>
    @endpush
</x-app-layout>