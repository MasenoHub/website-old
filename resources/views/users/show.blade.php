<x-app-layout>
    @section('title', $user->name)
    @section('url', route('users.show', ['id' => $user->id]))
    @section('description', "{$user->name} | User profile on Maseno Hub")

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

        <div id="details" class="mt-12 bg-gray-100" x-data="{ selected: 1 }">
            <div class="w-full md:w-1/2 flex justify-between">
                <a href="#1" class="p-4 flex justify-between hover:bg-white flex-grow items-center"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 1 }" x-on:click="selected = 1">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-comments mr-2"></i> Questions
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 1 }">
                        {{ $user->questions->count() }}
                    </span>
                </a>
                <a href="#2" class="p-4 flex justify-between hover:bg-white flex-grow items-center"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 2 }" x-on:click="selected = 2">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-comment mr-2"></i> Answers
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 2 }">
                        {{ $user->answers->count() }}
                    </span>
                </a>
                <a href="#3" class="p-4 flex justify-between hover:bg-white flex-grow items-center"
                    x-bind:class="{ 'font-semibold bg-white' : selected === 3 }" x-on:click="selected = 3">
                    <span class="flex flex-col sm:block items-center mx-auto">
                        <i class="far fa-newspaper mr-2"></i> Posts
                    </span>
                    <span class="hidden sm:block count px-3 py-1 rounded-full bg-white"
                        x-bind:class="{ 'bg-blue-400 text-white' : selected === 3 }">
                        {{ $user->posts->count() }}
                    </span>
                </a>
            </div>
            <div class="bg-white p-4" x-show.transition.in.opacity.duration.750ms="selected === 1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptatibus quos modi voluptatem
                totam sapiente est, voluptas quas facilis reiciendis culpa magni delectus dolorem sint! Minus in
                perspiciatis officia ducimus.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam tenetur facere ad quasi laboriosam
                ullam quaerat fuga nam voluptatum alias! Unde itaque maiores cumque accusantium dignissimos, animi
                dolores architecto eaque!
            </div>
            <div class="bg-white p-4" x-show.transition.in.opacity.duration.750ms="selected === 2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptatibus quos modi voluptatem
                totam sapiente est, voluptas quas facilis reiciendis culpa magni delectus dolorem sint! Minus in
                perspiciatis officia ducimus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ducimus tenetur consequatur quibusdam
                voluptatibus. Sint corrupti ipsa quae placeat quasi, enim hic, doloremque labore voluptates temporibus
                tempore culpa consequatur ea?
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt numquam voluptatibus ullam veritatis
                accusamus quae perspiciatis reprehenderit eius ab, recusandae dolore saepe deleniti blanditiis aliquam
                et sed modi unde pariatur.
            </div>
            <div class="bg-white p-4" x-show.transition.in.opacity.duration.750ms="selected === 3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptatibus quos modi voluptatem
                totam sapiente est, voluptas quas facilis reiciendis culpa magni delectus dolorem sint! Minus in
                perspiciatis officia ducimus.
            </div>
        </div>
    </div>

</x-app-layout>