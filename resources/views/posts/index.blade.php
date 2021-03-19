<x-app-layout>
    @section('title', 'Blog')
    @section('url', route('posts.index'))
    @section('description', 'The Maseno Hub Blog.')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maseno Hub Blog') }}
        </h2>
    </x-slot>

    <section class="bg-white text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-12">
                @foreach ($posts as $post)
                <div class="p-12 md:w-1/2 flex flex-col items-start">
                    <span
                        class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">Last
                        updated <span class="timeago"
                            datetime="{{ $post->updated_at->toDateTimeString() }}"></span></span>
                    <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
                        {{ $post->title }}
                    </h2>
                    <p class="leading-relaxed mb-8">{{ $post->summary }}</p>
                    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                            class="text-indigo-500 inline-flex items-center">
                            Read More
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        {{-- <span
                            class="text-gray-400 mr-3 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                            <i class="far fa-eye mr-1"></i>1.2K
                        </span> --}}
                        {{-- <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                            <i class="far fa-comment mr-1"></i>6
                        </span> --}}
                    </div>
                    <a class="inline-flex items-center">
                        <img alt="{{ $post->author->name }}" src="{{ $post->author->profile_photo_url }}"
                            class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                        <span class="flex-grow flex flex-col pl-4">
                            <span class="title-font font-medium text-gray-900">{{ $post->author->name }}</span>
                            {{-- <span class="text-gray-400 text-xs tracking-widest mt-0.5 uppercase">{{ $post->author->role }}</span>
                        --}}
                        <span class="text-gray-400 text-xs tracking-widest mt-0.5 uppercase">admin</span>
                        </span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @push('scripts')
    <script src="{{ mix('js/posts/index.js') }}" defer></script>
    @endpush
</x-app-layout>