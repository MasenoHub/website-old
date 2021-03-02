<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Q&A') }}
        </h2>
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
                        <a href="#" class="text-lg">{{ $question->title }}</a>
                    </div>
                </div>
                <div class="w-full flex text-right">
                    <p class="ml-auto text-xs text-gray-500 w-full">Asked on {{ $question->created_at }} by <span class="text-gray-900">{{ $question->author->name }}</span></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>