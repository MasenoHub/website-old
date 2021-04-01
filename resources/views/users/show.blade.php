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
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Profile') }}
            </h2>
            @if (Auth::check() && (Auth::id() === $user->id))
            <a href="{{ route('questions.new') }}" class="text-sm px-4 py-2 rounded-lg hover:shadow-inner -my-4">
                <i class="fas fa-user-cog mr-2"></i> Manage Profile
            </a>
            @endif
        </div>
    </x-slot>

    <div>
        <div id="overview" class="p-6 sm:px-20 grid grid-cols-1 md:grid-cols-2 mb-2 bg-white">
            <div class="flex flex-col items-center">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="h-40 rounded-full mb-4">
                <p class="font-semibold text-2xl mb-4">{{ $user->name }}</p>
                <div class="flex justify-between text-3xl">
                    <a href="#"><i class="fab fa-github mx-4"></i></a>
                    <a href="#"><i class="fab fa-twitter mx-4 text-blue-500"></i></a>
                    <a href="#"><i class="fab fa-linkedin mx-4 text-blue-800"></i></a>
                </div>
            </div>
            <div>
                <p class="text-xl font-semibold py-2 border-b mb-2">Overview</p>
                <p class="capitalize mb-2">
                    <span class="font-semibold">Role:</span> {{$user->role}}
                </p>
                <p class="mb-2">
                    <span class="font-semibold">Joined on:</span>
                    {{$user->created_at}}
                    <span class="text-gray-500 text-sm">
                        (<span class="timeago" datetime="{{ $user->created_at->toDateTimeString() }}"></span>)
                    </span>
                </p>

                @if ($user->role === 'admin')
                <p class="mb-2">
                    <span class="font-semibold">Events Organized: </span>
                    <span>{{ $user->events->count() }}</span>
                </p>
                <p class="mb-2">
                    <span class="font-semibold">Projects Started: </span>
                    <span>{{ $user->projects->count() }}</span>
                </p>
                @endif

                <p class="mb-2">
                    <span class="font-semibold">Questions Asked: </span>
                    <span>{{ $user->questions->count() }}</span>
                </p>
                <p class="mb-2">
                    <span class="font-semibold">Answers Written: </span>
                    <span>{{ $user->answers->count() }}</span>
                </p>

                @if (in_array($user->role, ['admin', 'editor']))
                <p class="mb-2">
                    <span class="font-semibold">Blog Posts Written: </span>
                    <span>{{ $user->posts->whereNotNull(['published_at'])->count() }}</span>
                </p>
                @endif
            </div>
        </div>

        <div id="details" class="bg-gray-100"
            x-data="{ selected: window.location.hash ? window.location.hash.substring(1) : 'questions' }">
            <div class="w-full md:w-2/3 lg:w-1/2 flex justify-between">
                <a href="#questions"
                    class="p-4 flex justify-between hover:bg-white flex-grow items-center rounded-t-lg mx-1"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 'questions' }"
                    x-on:click="selected = 'questions'">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-comments mr-2"></i> Questions
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 'questions' }">
                        {{ $user->questions->count() }}
                    </span>
                </a>
                <a href="#answers"
                    class="p-4 flex justify-between hover:bg-white flex-grow items-center rounded-t-lg mx-1"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 'answers' }"
                    x-on:click="selected = 'answers'">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-comment mr-2"></i> Answers
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 'answers' }">
                        {{ $user->answers->count() }}
                    </span>
                </a>
                <a href="#posts"
                    class="p-4 flex justify-between hover:bg-white flex-grow items-center rounded-t-lg mx-1"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 'posts' }" x-on:click="selected = 'posts'">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-newspaper mr-2"></i> Posts
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 'posts' }">
                        {{ user->posts->whereNotNull(['published_at'])->count() }}
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
                        <i class="fas fa-reply mr-2"></i> Replying to
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