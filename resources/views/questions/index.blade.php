<x-app-layout>
    @section('title', 'Q&A')
    @section('url', route('questions.index'))
    @section('description', 'Maseno Hub Q&A.')

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            @foreach ($questions as $question)
            <div class="col-span-1 bg-white rounded-lg shadow hover:shadow-lg p-4">
                <div class="flex">
                    <div class="rounded-lg border border-blue-600 p-2 text-xs text-center">
                        <div class="text-bold">{{ $question->answers->count() }}</div> Answers
                    </div>
                    <div class="ml-4">
                        <a href="{{ route('questions.show', ['question' => $question->id]) }}"
                            class="text-lg">{{ $question->title }}</a>
                    </div>
                </div>
                <div class="w-full flex text-right">
                    <p class="ml-auto text-xs text-gray-500 w-full">Asked on {{ $question->created_at }} by
                        <a href="{{ route('users.show', ['id' => $question->author->id]) }}" class="font-semibold text-gray-900 hover:underline">{{ $question->author->name }}</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>