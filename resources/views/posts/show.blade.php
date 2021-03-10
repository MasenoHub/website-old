<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maseno Hub Blog') }}
        </h2>
        {{-- <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div> --}}
    </x-slot>

    <div class="container w-full md:max-w-3xl mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            <div class="font-sans">
                <a href="{{ route('posts.index') }}"
                    class="text-base md:text-sm text-indigo-500 font-bold no-underline hover:underline">
                    <i class="fas fa-arrow-left mr-2"></i>
                    BACK TO BLOG
                </a>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    {{ $post->title }}
                </h1>
                <p class="text-sm md:text-base font-normal text-gray-600">
                    Last updated on {{ $post->updated_at->toFormattedDateString() }}
                </p>
            </div>

            <div class="py-8">{{ $post->body }}</div>
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
                {{-- <p class="text-gray-600 text-xs md:text-base uppercase">{{ $post->author->role }}</p> --}}
                <p class="text-gray-600 text-xs md:text-base uppercase">admin</p>
            </div>
            <div class="justify-end">
                <a href="#"
                    class="bg-transparent border border-gray-500 hover:border-indigo-500 text-xs text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">My
                    Posts</a>
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
</x-app-layout>