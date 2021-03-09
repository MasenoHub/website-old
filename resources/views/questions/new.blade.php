<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ask a Question') }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-white pt-4">
            @if ($errors->any())
            <div class="mx-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="my-2 border-l-4 border-red-600 px-4 py-2 bg-red-200 text-red-600">
                        <strong>Error!</strong>
                        <p>{{ $error }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST">
                @csrf

                <div class="overflow-hidden">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" autocomplete="title"
                                placeholder="Be specific and direct." required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                            <textarea name="body" id="body"
                                placeholder="Give additional information that would enable respondents to understand your question."
                                rows="7" required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="mb-4 px-2 py-4">
                            <p class="text-sm">
                                <i class="fas fa-info-circle"></i>
                                Be sure to follow the <a href="#" class="text-blue-500 hover:underline">Maseno Hub
                                    Contribution Guidelines</a>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 text-right py-4 px-4 sm:px-6 lg:px-8">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>