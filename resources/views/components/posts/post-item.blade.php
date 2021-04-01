@props(['post', 'author' => false])

<div class="p-12 flex flex-col items-start rounded-lg hover:shadow">
    <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">
        Category
    </span>
    <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
        {{ $post->title }}
    </h2>
    <p class="leading-relaxed mb-8">{{ $post->summary }}</p>

    <div class="text-sm mb-4">
        <p class="mb-2">Published on {{ $post->created_at }}</p>
        <p class="mb-2">Last updated
            <span class="timeago" datetime="{{ $post->updated_at->toDateTimeString() }}"></span>
        </p>
    </div>
    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-indigo-500 inline-flex items-center">
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

    @if ($author)
    <a class="inline-flex items-center">
        <img alt="{{ $post->author->name }}" src="{{ $post->author->profile_photo_url }}"
            class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
        <span class="flex-grow flex flex-col pl-4">
            <span class="title-font font-medium text-gray-900">{{ $post->author->name }}</span>
            <span class="text-gray-400 text-xs tracking-widest mt-0.5 uppercase">{{ $post->author->role }}</span>
        </span>
    </a>
    @endif
</div>