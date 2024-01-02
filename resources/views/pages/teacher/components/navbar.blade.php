<div class="sticky top-0  bg-white">
    <div id="backdrop" onclick="handleModal()"
        class="fixed h-screen w-screen pointer-events-none bg-black opacity-0 z-[49] duration-300 md:opacity-0 ease-in-out">

    </div>
    <div class="flex flex-row justify-between w-full max-w-[1280px] mx-auto px-4 py-3">
        <h1 class="flex-1 font-bold">Graduation Guidance <span class="text-sm font-light">Teacher</span></h1>
        <div id="content"
            class="flex items-center translate-x-[1280px] duration-300 ease-in-out md:translate-x-0 md:h-fit flex-col md:flex-row md:border-none rounded-md w-[80%] h-screen md:w-fit px-3 fixed right-0 top-0 py-4 md:py-0 z-[100] md:static gap-2 bg-white">
            <h1 class="mb-4 md:hidden">Select Menu</h1>
            <a class="w-full" href="{{ route('teacher.profile') }}">
                <div
                    class="{{ Request::segment(2) == 'profile' ? 'flex text-white bg-red-500' : '' }} px-3 py-1 rounded-md">
                    Profile</div>
            </a>
            <a class="w-full" href="{{ route('teacher.mentoring') }}">
                <div
                    class="{{ Request::segment(2) == 'mentoring' ? 'flex text-white bg-red-500' : '' }} px-3 py-1 rounded-md">
                    Mentoring</div>
            </a>
            <a class="w-full" href="{{ route('teacher.student') }}">
                <div
                    class="{{ Request::segment(2) == 'student' ? 'flex text-white bg-red-500' : '' }} px-3 py-1 rounded-md">
                    Students</div>
            </a>
            <a class="w-full" href="{{ route('teacher.broadcast') }}">
                <div
                    class="{{ Request::segment(2) == 'broadcast' ? 'flex text-white bg-red-500' : '' }} px-3 py-1 rounded-md">
                    Broadcast</div>
            </a>
            <form class="w-full md:hidden" method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link class="text-start w-full" :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
        <div class="flex-1 self-end md:flex items-end justify-end hidden"><!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
        <div onclick="handleModal()" class="items-center flex justify-center md:hidden">
            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 15 15" height="1.5em" width="1.5em"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1.5 3C1.22386 3 1 3.22386 1 3.5C1 3.77614 1.22386 4 1.5 4H13.5C13.7761 4 14 3.77614 14 3.5C14 3.22386 13.7761 3 13.5 3H1.5ZM1 7.5C1 7.22386 1.22386 7 1.5 7H13.5C13.7761 7 14 7.22386 14 7.5C14 7.77614 13.7761 8 13.5 8H1.5C1.22386 8 1 7.77614 1 7.5ZM1 11.5C1 11.2239 1.22386 11 1.5 11H13.5C13.7761 11 14 11.2239 14 11.5C14 11.7761 13.7761 12 13.5 12H1.5C1.22386 12 1 11.7761 1 11.5Z"
                    fill="currentColor"></path>
            </svg>
        </div>
    </div>

</div>
