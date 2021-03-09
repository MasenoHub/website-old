<x-app-layout>
    <div class="max-w-7xl">
        <div class="bg-white">
            <div id="hero" class="p-6 sm:px-20 bg-white flex flex-col justify-between"
                style="height: calc(100vh - 4rem);">
                <div>
                    <div>
                        <p class="text-3xl font-semibold flex items-center">
                            <x-jet-application-mark class="h-12 w-auto mr-4" /> Maseno Hub</p>
                    </div>
                    <div class="mt-8 text-2xl">
                        Welcome to Maseno Hub!
                    </div>
                    <div class="mt-6 text-gray-500">
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application.
                        Laravel is designed
                        to help you build your application using a development environment that is simple, powerful, and
                        enjoyable. We believe
                        you should love expressing your creativity through programming, so we have spent time carefully
                        crafting the Laravel
                        ecosystem to be a breath of fresh air. We hope you love it.
                    </div>
                </div>

                <button class="mx-auto animate-bounce justify-self-end"
                    onclick="document.getElementById('activities').scrollIntoView({behavior: 'smooth'});">
                    <i class="fas fa-arrow-down"></i>
                </button>
            </div>

            <div id="activities" class="py-12 bg-white shadow-b">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Activities</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            What we do
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate
                            veritatis in accusamus quisquam.
                        </p>
                    </div>

                    <div class="mt-10">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg leading-6 font-medium text-gray-900">
                                        <a href="{{ route('events.index') }}">Events</a>
                                    </dt>
                                    <dd class="mt-2 text-base text-gray-500">
                                        The Maseno Hub community holds regular meetups and often schedules other events.
                                        We guarantee that no matter your interests, you will find something for you.
                                        View all upcoming events and never miss an event again.
                                    </dd>
                                    <a href="{{ route('events.index') }}">
                                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                            <div>Discover events</div>
                                            <i class="fas fa-arrow-right ml-1 text-indigo-500"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg leading-6 font-medium text-gray-900">
                                        <a href="{{ route('projects.index') }}">Projects</a>
                                    </dt>
                                    <dd class="mt-2 text-base text-gray-500">
                                        Collaboration is at the very heart of Maseno Hub. Discover and collaborate on
                                        projects being undertaken by various members of the community, or initiate a
                                        project of your own.
                                    </dd>
                                    <a href="{{ route('projects.index') }}">
                                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                            <div>Explore projects</div>
                                            <i class="fas fa-arrow-right ml-1 text-indigo-500"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                        <i class="far fa-comments"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg leading-6 font-medium text-gray-900">
                                        <a href="{{ route('questions.index') }}">Q&A</a>
                                    </dt>
                                    <dd class="mt-2 text-base text-gray-500">
                                        Having trouble? We are always there to help! The Maseno Hub community has
                                        experts in various fields who won't hesitate to help you with whatever trouble
                                        you may be experiencing.
                                    </dd>
                                    <a href="{{ route('questions.index') }}">
                                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                            <div>Contribute in Q&A</div>
                                            <i class="fas fa-arrow-right ml-1 text-indigo-500"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                        <i class="far fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg leading-6 font-medium text-gray-900">
                                        <a href="#">Blog</a>
                                    </dt>
                                    <dd class="mt-2 text-base text-gray-500">
                                        The Maseno Hub Blog is home to regularly-updated, high-quality, curated content
                                        that is guaranteed to enable you to develop new skills and proficiences and/or
                                        hone your current skillset.
                                    </dd>
                                    <a href="#">
                                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                            <div>Read the blog</div>
                                            <i class="fas fa-arrow-right ml-1 text-indigo-500"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <div id="event" class="py-12 bg-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center mb-4">
                        <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Next Up</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            {{ $event->title }}
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            {{ $event->description }}
                        </p>
                    </div>
                    <div class="gap-4 flex overflow-x-scroll py-2">
                        <div class="rounded-full bg-white flex flex-grow-0 flex-shrink-0 items-center pr-2">
                            <img src="{{ $event->organizer->profile_photo_url }}" alt="{{ $event->organizer->name }}"
                                class="h-8 rounded-full mr-2">
                            {{ $event->organizer->name }}
                        </div>
                        <p class="py-1 px-2 rounded-full bg-white flex-grow-0 flex-shrink-0">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            {{ $event->venue }}
                        </p>
                        <p class="py-1 px-2 rounded-full bg-white flex-grow-0 flex-shrink-0">
                            <i class="fas fa-flag text-green-600 mr-1"></i>
                            {{ $event->start->toDayDateTimeString() }}
                        </p>
                        <p class="py-1 px-2 rounded-full bg-white flex-grow-0 flex-shrink-0">
                            <i class="fas fa-flag-checkered mr-1"></i>
                            {{ $event->end->toDayDateTimeString() }}
                        </p>
                    </div>
                </div>
            </div>

            <div id="stats" class="py-12 shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Stats</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            The Numbers
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate
                            veritatis in accusamus quisquam.
                        </p>
                    </div>

                    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <div class="col-span-1 text-center py-4">
                            <p class="text-6xl mb-2">{{ $stats['events'] }}</p>
                            <p class="text-gray-500">Events held</p>
                        </div>
                        <div class="col-span-1 text-center py-4">
                            <p class="text-6xl mb-2">{{ $stats['projects'] }}</p>
                            <p class="text-gray-500">Projects commenced</p>
                        </div>
                        <div class="col-span-1 text-center py-4">
                            <p class="text-6xl mb-2">{{ $stats['questions'] }}</p>
                            <p class="text-gray-500">Questions asked</p>
                        </div>
                        <div class="col-span-1 text-center py-4">
                            <p class="text-6xl mb-2">{{ $stats['posts'] }}</p>
                            <p class="text-gray-500">Posts written</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="cta" class="bg-gray-50">
                <div
                    class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block">Ready to join us?</span>
                        <span class="block text-indigo-600">Start your journey today.</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <a href={{ route('register') }}
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Register
                            </a>
                        </div>
                        <div class="ml-3 inline-flex rounded-md shadow">
                            <a href="{{ route('about') }}"
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="contact" class="pt-12 shadow-t">
                <div class="max-w-7xl mx-auto">
                    <div class=" px-4 sm:px-6 lg:px-8">
                        <div class="lg:text-center">
                            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Contact Us</h2>
                            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                Get in Touch
                            </p>
                            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                                Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum
                                cupiditate
                                veritatis in accusamus quisquam.
                            </p>
                        </div>
                    </div>

                    <form action="#" method="POST">
                        @csrf

                        <div class="overflow-hidden">
                            <div class="px-4 sm:px-6 lg:py-16 lg:px-8">
                                <div class="grid grid-cols-6 gap-6 py-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" autocomplete="name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email
                                            Address</label>
                                        <input type="email" name="email" id="email" autocomplete="email"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="message"
                                            class="block text-sm font-medium text-gray-700">Message</label>
                                        <textarea name="message" id="message"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 text-right py-4 px-4 sm:px-6 lg:px-8">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>