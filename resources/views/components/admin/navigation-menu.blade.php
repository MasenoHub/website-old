<nav class="md:mt-8 -mx-2">
    <ul class="text-base pt-2 space-y-3">
        <li>
            <x-admin.nav-link href="{{ route('admin.index') }}" icon="fas fa-tachometer-alt" :active="request()->routeIs('admin.index')">
                Dashboard
            </x-admin.nav-link>
        </li>
        <li>
            <x-admin.nav-link href="{{ route('admin.events.index') }}" icon="far fa-calendar-alt" :active="request()->routeIs('admin.events.*')">
                Events
            </x-admin.nav-link>
        </li>
        <li>
            <x-admin.nav-link href="{{ route('admin.projects.index') }}" icon="fas fa-project-diagram" :active="request()->routeIs('admin.projects.*')">
                Projects
            </x-admin.nav-link>
        </li>
        <li>
            <x-admin.nav-link href="{{ route('admin.questions.index') }}" icon="far fa-comments" :active="request()->routeIs('admin.questions.*')">
                Questions
            </x-admin.nav-link>
        </li>
        <li>
            <x-admin.nav-link href="{{ route('admin.posts.index') }}" icon="far fa-newspaper" :active="request()->routeIs('admin.posts.*')">
                Posts
            </x-admin.nav-link>
        </li>
    </ul>
</nav>