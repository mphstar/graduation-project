@extends('layouts.app')

@section('content')
    <!-- Include the sidebar content -->
    @include('layouts.admin-sidebar')
    @include('admin.components.modal-broadcast-message')

    <!-- Ucapan selamat Datang Dan Hari Ini -->
    <div class="pl-64 pt-7">

        <div class="p-4 mt-6">

            <div class="flex items-center justify-center">
                <div class="flex items-center bg-white p-4 w-3/4" id="search-form">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative flex items-center w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search" required="">
                    </div>
                </div>

                <button type="button" onclick="openModal()"
                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">
                    Broadcast Message
                </button>
            </div>

            <div class="p-6">

                <div class="max-w-full mx-auto mt-8">
                    <h2 class="text-2xl font-semibold mb-4 text-center">Broadcast Messages</h2>
                    @if (count($broadcastMessages) == 0)
                        <p>No messages</p>
                    @else
                        <ul class="space-y-4">
                            @foreach ($broadcastMessages as $message)
                                <li class="broadcast-message border p-4 rounded-md shadow-md hover:bg-slate-100">
                                    <h3 class="message-title text-lg font-semibold mb-2">{{ $message->title }}</h3>
                                    <p class="message-content text-gray-600">{{ $message->content }}</p>
                                    <p class="message-created-at text-sm text-gray-500 mt-2">Sent on:
                                        {{ $message->created_at }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>


            </div>

        </div>
    </div>
@endsection

@section('otherjs')
    <script src="/js/admin/search-broadcast.js"></script>
    <script src="/js/admin/modalbroadcast.js"></script>
@endsection
