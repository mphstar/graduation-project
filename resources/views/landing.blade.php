@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen flex-col w-full h-full">
        <div class="sticky top-0  bg-white z-[200]">
            <div id="backdrop" onclick="handleModal()"
                class="fixed h-screen w-screen pointer-events-none bg-black opacity-0 z-[49] duration-300 md:opacity-0 ease-in-out">

            </div>
            <div class="flex flex-row justify-between items-center w-full max-w-[1280px] mx-auto px-4 py-3">
                <h1 class="flex-1 font-bold">Graduation Guidance</h1>
                <div id="content"
                    class="flex items-center translate-x-[1280px] duration-300 ease-in-out md:translate-x-0 md:h-fit flex-col md:flex-row md:border-none rounded-md w-[80%] h-screen md:w-fit px-3 fixed right-0 top-0 py-4 md:py-0 z-[100] md:static gap-2 bg-white">
                    <h1 class="mb-4 md:hidden">Select Menu</h1>
                    <a class="w-full" href="#home">
                        <div class="px-2 hover:bg-gray-100 py-1 rounded-md">
                            Home</div>
                    </a>
                    <a class="w-full" href="#about">
                        <div class=" px-2 hover:bg-gray-100 py-1 rounded-md">
                            About</div>
                    </a>
                    <a class="w-full" href="#contact">
                        <div class=" px-2 hover:bg-gray-100 py-1 rounded-md">
                            Contact</div>
                    </a>
                    <div class="w-full md:hidden flex flex-col gap-2">
                        <a class="w-full" href="{{ route('login') }}">
                            <div class=" px-2 hover:bg-gray-100 py-1 rounded-md">
                                Log In</div>
                        </a>
                        <a class="w-full" href="{{ route('register') }}">
                            <div class=" px-2 hover:bg-gray-100 py-1 rounded-md">
                                Sign Up</div>
                        </a>
                    </div>
                </div>
                <div class="flex-1 self-end md:flex items-end justify-end hidden"><!-- Authentication -->
                    <x-dropdown-link class=" w-fit" :href="route('login')">
                        {{ __('Log In') }}
                    </x-dropdown-link>
                    <x-dropdown-link class=" w-fit" :href="route('register')">
                        {{ __('Sign Up') }}
                    </x-dropdown-link>
                </div>
                <div onclick="handleModal()" class="items-center flex justify-center md:hidden">
                    <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 15 15" height="1.5em"
                        width="1.5em" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.5 3C1.22386 3 1 3.22386 1 3.5C1 3.77614 1.22386 4 1.5 4H13.5C13.7761 4 14 3.77614 14 3.5C14 3.22386 13.7761 3 13.5 3H1.5ZM1 7.5C1 7.22386 1.22386 7 1.5 7H13.5C13.7761 7 14 7.22386 14 7.5C14 7.77614 13.7761 8 13.5 8H1.5C1.22386 8 1 7.77614 1 7.5ZM1 11.5C1 11.2239 1.22386 11 1.5 11H13.5C13.7761 11 14 11.2239 14 11.5C14 11.7761 13.7761 12 13.5 12H1.5C1.22386 12 1 11.7761 1 11.5Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>

        </div>

        {{-- end navbar --}}

        {{-- section home --}}
        <section id="home">
            <div class="flex w-full h-fit relative overflow-hidden">
                <img class="absolute translate-x-[300px]  xl:translate-x-0 bottom-0 right-0 -z-10"
                    src="assets/images/img1.png" alt="bg">
                <img class="absolute -translate-x-[300px] xl:translate-x-0 top-0 left-0-0 -z-10"
                    src="assets/images/img2.png" alt="bg">
                <div class="flex max-w-[1280px] px-4 py-20 mx-auto flex-col md:flex-row w-full justify-between gap-5">
                    <div class="flex flex-col h-full justify-center gap-3">
                        <h1 class="text-5xl md:text-7xl font-extrabold">Graduation Guidance</h1>
                        <p class="text-lg font-semibold text-gray-500">Providing an interactive platform for students and
                            teachers to get guidance and guidance in completing your final project.</p>
                    </div>
                    <img class="md:h-96 lg:h-fit" src="/assets/images/dashboard.png" alt="ic">
                </div>
            </div>
        </section>

        {{-- section about --}}
        <section id="about">
            <div class="flex w-full bg-gradient-to-t from-red-500 to-white pb-20 md:pb-40 h-fit relative overflow-hidden">
                <div class="flex max-w-[880px] px-4 py-20 mx-auto flex-col w-full justify-between gap-5">
                    <h1 class="text-6xl font-extrabold text-center">Our Service</h1>
                    <div class="grid grid-cols-1 items-center justify-center md:grid-cols-3 gap-8 mt-6">
                        <div
                            class="flex rounded-md flex-col w-full h-full bg-white drop-shadow-xl px-4 py-4 place-items-center">
                            <img class="w-24" src="/assets/images/ic1.png" alt="ic1">
                            <p class="text-center">Make it easier for students to get guidance and answer questions related
                                to their
                                projects.</p>
                        </div>
                        <div
                            class="flex rounded-md flex-col w-full h-full bg-white drop-shadow-xl px-4 py-4 place-items-center">
                            <img class="w-24 pb-4" src="/assets/images/ic2.png" alt="ic2">
                            <p class="text-center">Assist teachers or lecturers in providing more efficient guidance on
                                projects being carried out by students.</p>
                        </div>
                        <div
                            class="flex rounded-md flex-col w-full h-full bg-white drop-shadow-xl px-4 py-4 place-items-center">
                            <img class="w-24" src="/assets/images/ic3.png" alt="ic3">
                            <p class="text-center">Provides administrators with access to manage user information as well as
                                analyze statiscal data for system improvments</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- section contact --}}
        <section id="contact">
            <div class="flex w-full h-fit relative bg-gray-100 py-12 px-4 overflow-hidden">
                <div
                    class="flex max-w-[1280px] h-fit bg-white drop-shadow-xl pt-12 md:py-12 mx-auto relative flex-col md:flex-row w-full  gap-5">
                    <div class="bg-red-600 h-full hidden w-[200px] absolute right-0 bottom-0 md:flex">

                    </div>
                    <div class="flex-1 flex flex-col pl-12 md:pl-32 pr-12">
                        <h1 class="font-extrabold text-4xl">Contact Us</h1>
                        <p class="mt-4">Feel free to contact us. We will get in touch as soon as posible.</p>
                        <form class="mt-6 w-full md:w-[70%]" action="{{ route('guestbook') }}" method="post">
                            @csrf
                            <div class="flex flex-col w-full">
                                <p class="py-1">Name <span class="text-red-600">*</span></p>
                                <div class="">
                                    <input required class="w-full border-[2px] px-3 py-2 border-gray-300 rounded-lg"
                                        type="text" name="name" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="flex flex-col w-full mt-2">
                                <p class="py-1">Email <span class="text-red-600">*</span></p>
                                <div class="">
                                    <input required class="w-full border-[2px] px-3 py-2 border-gray-300 rounded-lg"
                                        type="text" name="email" id="email" placeholder="">
                                </div>
                            </div>
                            <div class="flex flex-col w-full mt-2">
                                <p class="py-1">Message <span class="text-red-600">*</span></p>
                                <div class="">
                                    <textarea required class="w-full min-h-[100px] border-[2px] px-3 py-2 border-gray-300 rounded-lg" type="text"
                                        name="message" id="message" placeholder=""></textarea>
                                </div>
                            </div>
                            <button
                                class="bg-gray-700 text-white px-4 py-2 rounded-lg mt-4 hover:bg-gray-800">Send</button>
                        </form>
                    </div>

                    <div class="flex items-center flex-row justify-end md:py-12 w-full md:w-[30%] relative">
                        <div class="bg-red-500 w-10 h-10 absolute md:left-4 top-20">

                        </div>
                        <div class="flex flex-col gap-4 w-full md:w-[90%] bg-black py-12 px-6 h-fit">
                            <div class="flex flex-row gap-3 fill-white text-white items-center">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                                    height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-40 110.8V792H136V270.8l-27.6-21.5 39.3-50.5 42.8 33.3h643.1l42.8-33.3 39.3 50.5-27.7 21.5zM833.6 232L512 482 190.4 232l-42.8-33.3-39.3 50.5 27.6 21.5 341.6 265.6a55.99 55.99 0 0 0 68.7 0L888 270.8l27.6-21.5-39.3-50.5-42.7 33.2z">
                                    </path>
                                </svg>
                                <p>contactus@gmail.com</p>
                            </div>
                            <div class="flex flex-row gap-3 fill-white text-white items-center">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                    height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z">
                                    </path>
                                </svg>
                                <p>+1 1552 3234 234</p>
                            </div>
                            <div class="flex flex-row gap-3 fill-white text-white items-center">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 384 512"
                                    height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                                    </path>
                                </svg>
                                <p>178 Shenbei St.</p>
                            </div>
                            <div class="flex flex-row gap-3 fill-white text-white items-center">
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                    stroke-linecap="round" stroke-linejoin="round" height="2em" width="2em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <p>09.00 - 18.00</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection

@section('otherjs')
    <script src="/js/landing.js"></script>
@endsection
