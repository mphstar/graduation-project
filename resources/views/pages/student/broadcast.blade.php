@extends('layouts.app')

@section('content')
    @include('pages.student.components.modal_question')
    <div class="flex min-h-screen bg-gray-50 flex-col w-full h-full">
        @include('pages.student.components.navbar')
        <div class="flex flex-col max-w-[1280px] h-full flex-1 mx-auto w-full mt-6 px-4">
            <div class="flex flex-col md:flex-row w-full h-fit mt-0 justify-between items-center gap-2">
                <h1 class="font-semibold text-2xl">Messages</h1>
                <div class="flex flex-row md:flex-row gap-2 w-full cursor-default md:w-fit mt-4 md:mt-0 justify-between">
                    <div class="flex flex-col sm:flex-row h-fit items-center  gap-2 w-full md:w-fit">

                        <form class="w-full" action="{{ route('student.broadcast') }}" method="get"><input id="keyword"
                                value="{{ Request::has('search') ? Request::query('search') : '' }}"
                                class="py-2 px-6 border-[2px] border-gray-200 rounded-lg outline-none w-full flex-1 md:max-w-[400px]"
                                placeholder="Search..." name="search" type="text"></form>
                    </div>
                </div>

            </div>
            <div class="w-full h-full max-w-[1280px] mx-auto flex flex-grow mb-6 flex-col bg-white duration-300 ease-in-out  mt-4 min-h-[400px] rounded-lg px-6 py-4 border-[2px] overflow-x-auto"
                style="opacity: 1;">
                @if (count($broadcast) == 0)
                    <p>No messages</p>
                @else
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($broadcast as $item)
                            <div class="flex flex-col border-b-2 pb-4">
                                <p class="font-bold">Teacher</p>
                                <p class="text-gray-500 text-sm">{{ $item->created_at }}</p>
                                <p class="mt-2 font-semibold">{{ $item->title }}</p>
                                <p>{{ $item->content }}</p>
                            </div>
                        @endforeach


                    </div>
                @endif



            </div>
        </div>

    </div>
@endsection

@section('otherjs')
    <script src="/js/student/mentoring.js"></script>
    <script src="/js/navbar.js"></script>
@endsection
