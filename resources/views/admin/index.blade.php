<x-admin-layout>
    @section('title', 'Dashboard')

    <div class="bg-white rounded-lg mb-8">
        <div class="py-4 lg:py-6 px-4 lg:px-8">
            <p class="text-2xl mb-2">Hello, {{ Auth::user()->name }}!</p>
            <h2 class="text-xl text-blue-900 font-bold ">
                This is your {{ Auth::user()->role }} dashboard.
            </h2>
        </div>
        <blockquote class="border-l-4 bg-gray-50 border-gray-500 px-4 py-2 rounded-b-lg">
            <p class="text-gray-600">Where there is great power there is great responsibility.</p>
            <small class="text-gray-400">- Winston Churchill<small>
        </blockquote>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 2xl:gap-8">
        <x-admin.overview-card title="Users" icon="fas fa-users" :value="$users" />
        <x-admin.overview-card title="Events" icon="far fa-calendar-alt" :value="$events" />
        <x-admin.overview-card title="Projects" icon="fas fa-project-diagram" :value="$projects" />
        <x-admin.overview-card title="Questions" icon="far fa-comments" :value="$questions" />
        <x-admin.overview-card title="Answers" icon="far fa-comment" :value="$answers" />
        <x-admin.overview-card title="Posts" icon="far fa-newspaper" :value="$posts" />
    </div>

    {{-- TODO Quick actions --}}
    <div
        class=" bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-12">
        <div>
            <h2 class="text-xl text-blue-900 font-bold mb-2">Quick actions</h2>
            <p class="text-blue-900 opacity-70">Your recently most used actions</p>
        </div>
        <nav class="md:flex md:space-x-4 space-y-2 md:space-y-0">
            <a href="#"
                class="inline-flex flex-col justify-center items-center px-3 py-3 border border-blue-100 rounded-lg hover:bg-blue-50 w-32">
                <svg class="w-8 h-8 text-blue-900" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                    </path>
                </svg>
                <span class="text-blue-900 opacity-70">
                    Create User
                </span>
            </a>
            <a href="#"
                class="inline-flex flex-col justify-center items-center px-3 py-3 border border-blue-100 rounded-lg hover:bg-blue-50 w-32">
                <svg class="w-8 h-8 text-blue-900" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-blue-900 opacity-70">
                    Create File
                </span>
            </a>
            <a href="#"
                class="inline-flex flex-col justify-center items-center px-3 py-3 border border-blue-100 rounded-lg hover:bg-blue-50 w-32">
                <svg class="w-8 h-8 text-blue-900" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                </svg>
                <span class="text-blue-900 opacity-70">
                    Edit User
                </span>
            </a>
            <a href="#"
                class="inline-flex flex-col justify-center items-center px-3 py-3 border border-blue-100 rounded-lg hover:bg-blue-50 w-32">
                <svg class="w-8 h-8 text-blue-900" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm9 4a1 1 0 10-2 0v6a1 1 0 102 0V7zm-3 2a1 1 0 10-2 0v4a1 1 0 102 0V9zm-3 3a1 1 0 10-2 0v1a1 1 0 102 0v-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-blue-900 opacity-70">
                    View Stats
                </span>
            </a>
        </nav>
    </div>
</x-admin-layout>