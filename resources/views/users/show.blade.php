<x-app-layout>
    @section('title', $user->name)
    @section('url', route('users.show', ['id' => $user->id]))
    @section('description', "{$user->name} | User profile on Maseno Hub")

    @section('meta:og')
    @parent
    <meta property="profile:first_name" content="{{ $user->name }}">
    <meta property="profile:last_name" content="{{ $user->name }}">
    <meta property="profile:username" content="{{ $user->name }}">
    <meta property="profile:gender" content="">
    @endsection

    @push('styles')
    <style>
        div#details a,
        div#details span {
            transition-duration: 500ms;
        }

        div#details a:hover>.count {
            background-color: rgb(96, 165, 250);
            color: white;
        }
    </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <div id="overview" class="p-6 sm:px-20 grid grid-cols-1 md:grid-cols-2">
            <div class="flex flex-col items-center">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="h-40 rounded-full mb-4">
                <p class="font-semibold text-2xl mb-4">{{ $user->name }}</p>
                <div class="flex justify-between text-3xl">
                    <i class="fab fa-github mx-4"></i>
                    <i class="fab fa-twitter mx-4 text-blue-500"></i>
                    <i class="fab fa-linkedin mx-4 text-blue-800"></i>
                </div>
            </div>
        </div>

        <div id="details" class="mt-12 bg-gray-100"
            x-data="{ selected: window.location.hash ? window.location.hash.substring(1) : 'questions' }">
            <div class="w-full md:w-1/2 flex justify-between">
                <a href="#questions" class="p-4 flex justify-between hover:bg-white flex-grow items-center"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 'questions' }"
                    x-on:click="selected = 'questions'">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-comments mr-2"></i> Questions
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 'questions' }">
                        {{ $questions->count() }}
                    </span>
                </a>
                <a href="#answers" class="p-4 flex justify-between hover:bg-white flex-grow items-center"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 'answers' }"
                    x-on:click="selected = 'answers'">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-comment mr-2"></i> Answers
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 'answers' }">
                        {{ $answers->count() }}
                    </span>
                </a>
                <a href="#posts" class="p-4 flex justify-between hover:bg-white flex-grow items-center"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 'posts' }" x-on:click="selected = 'posts'">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-newspaper mr-2"></i> Posts
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 'posts' }">
                        {{ $posts->count() }}
                    </span>
                </a>
            </div>
            <div class="bg-white p-4" x-show.transition.in.opacity.duration.750ms="selected === 'questions'">
                @foreach ($questions as $question)
                <div class="p-4 my-4 rounded-lg hover:shadow">
                    <a href="{{ route('questions.show', ['question' => $question->id]) }}"
                        class="font-semibold hover:text-blue-600 mb-4">
                        {{ $question->title }}
                    </a>
                    <div class="text-sm text-gray-500 text-right">
                        Asked on <a href="#" class="font-semibold hover:underline">{{ $question->created_at }}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg-white p-4" x-show.transition.in.opacity.duration.750ms="selected === 'answers'">
                @foreach ($answers as $answer)
                <div class="p-4 my-4 rounded-lg hover:shadow">
                    <p class="text-sm mb-4">
                        <i class="fas fa-arrow-left mr-2"></i> Replying to
                        <a href="{{ route('questions.show', ['question' => $answer->question->id]) }}"
                            class="font-semibold hover:underline">{{ $answer->question->title }}</a>
                    </p>
                    <p class="mb-4">{{ $answer->text }}</p>
                    <div class="text-sm text-gray-500 text-right">
                        Answered on <a href="#" class="font-semibold hover:underline">{{ $question->created_at }}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg-white p-4" x-show.transition.in.opacity.duration.750ms="selected === 'posts'">
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                    @foreach ($posts as $post)
                    <x-posts.post-item :post="$post" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ mix('js/users/show.js') }}" defer></script>
    @endpush
</x-app-layout>