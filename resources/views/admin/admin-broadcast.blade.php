@extends('layouts.app')

@section('content')
    <!-- Include the sidebar content -->
    @include('layouts.admin-sidebar')

    <!-- Ucapan selamat Datang Dan Hari Ini -->
    <div class="pl-64 pt-7">

        <div class="p-4 mt-6">

            <div class="py-12">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 mb-8">
                            <div class="text-center mb-4">
                                <h2 class="text-2xl font-semibold">Broadcast Message</h2>
                            </div>
                            <form method="POST" action="{{ route('broadcast-messages') }}">
                                @csrf
                                <div class="flex flex-col items-center space-y-4 mb-4">
                                    <div class="w-1/2">
                                        <label for="broadcast_title" class="block text-sm font-medium text-gray-700">Message
                                            Title</label>
                                        <input id="broadcast_title" type="text" name="broadcast_title"
                                            class="border border-gray-300 rounded-md p-2 w-full"
                                            placeholder="Enter message title" />
                                    </div>

                                    <div class="w-1/2">
                                        <label for="broadcast_content"
                                            class="block text-sm font-medium text-gray-700">Message
                                            Content</label>
                                        <textarea id="broadcast_content" name="broadcast_content"
                                            class="border border-gray-300 rounded-md p-2 w-full h-24 resize-none" placeholder="Enter message content"></textarea>
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <button id="broadcast_button" type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">
                                        Broadcast
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center">
                <form class="flex items-center bg-white p-4 rounded-lg border border-gray-300 w-3/4">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search" required="">
                    </div>
                </form>
            </div>

            <div class="p-6">

                <div class="max-w-full mx-auto mt-8">
                    <h2 class="text-2xl font-semibold mb-4">Broadcast Messages</h2>

                    <ul class="space-y-4">
                        @foreach ($broadcastMessages as $message)
                            <li class="border p-4 rounded-md shadow-md">
                                <h3 class="text-lg font-semibold mb-2">{{ $message->title }}</h3>
                                <p class="text-gray-600">{{ $message->content }}</p>
                                <p class="text-sm text-gray-500 mt-2">Sent on: {{ $message->created_at }}</p>
                            </li>
                        @endforeach

                    </ul>
                </div>


            </div>

        </div>
    </div>
@endsection

@section('otherjs')
    <script src="/js/admin/search-broadcast.js"></script>
@endsection
