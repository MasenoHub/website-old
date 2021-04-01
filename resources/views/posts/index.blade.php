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
            <div class="<span class="text-sm mb-4">Last updated
            <span class="timeago" datetime="{{ $post->updated_at->toDateTimeString() }}"></span>
        </span>">
                @foreach ($posts as $post)
                <x-posts.post-item :post="$post" author/>
                @endforeach
            </div>
        </div>
    </section>

    @push('scripts')
    <script src="{{ mix('js/posts/index.js') }}" defer></script>
    @endpush
</x-app-layout>