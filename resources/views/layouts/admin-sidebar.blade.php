<aside class="fixed top-0 left-0 z-30 w-64 h-screen pt-8 bg-zinc-700 border-r border-white-200" aria-label="Sidebar">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-center h-16">
            <span class="text-xl font-semibold text-white">Admin Dashboard</span>
        </div>

        <div class="flex flex-col flex-grow">
            <ul class="relative m-0 list-none px-[0.2rem]">
                <li class="relative">
                    <a href="{{ route('admin-main') }}"
                        class="group flex h-12 cursor-pointer justify-center items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear  hover:bg-white hover:text-black hover:outline-none focus:bg-white focus:text-black focus:outline-none active:bg-white active:text-black active:outline-none data-[te-sidenav-state-active]:text-black data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-white-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">
                        <span class=" font-semibold">Dashboard</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="{{ route('admin-student') }}"
                        class="group flex h-12 cursor-pointer justify-center items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear  hover:bg-white hover:text-black hover:outline-none focus:bg-white focus:text-black focus:outline-none active:bg-white active:text-black active:outline-none data-[te-sidenav-state-active]:text-black data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-white-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">
                        <span class=" font-semibold">Student List</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="{{ route('admin-teacher') }}"
                        class="group flex h-12 cursor-pointer justify-center items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear  hover:bg-white hover:text-black hover:outline-none focus:bg-white focus:text-black focus:outline-none active:bg-white active:text-black active:outline-none data-[te-sidenav-state-active]:text-black data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-white-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">
                        <span class=" font-semibold">Teacher List</span>
                    </a>
                </li>
            </ul>

            <div class="mt-auto pb-8">
                <form method="POST" action="{{ route('logout') }}"
                    class="group flex h-12 cursor-pointer justify-center items-center truncate py-4 text-[0.875rem] text-white transition duration-300 ease-linear  hover:bg-white hover:text-black hover:outline-none focus:bg-white focus:text-black focus:outline-none active:bg-white active:text-black active:outline-none data-[te-sidenav-state-active]:text-black data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-white-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">
                    @csrf
                    <button type="submit" class="font-black">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</aside>
