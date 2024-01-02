@extends('layouts.app')

@section('content')
    @include('pages.teacher.components.modal_answer')
    <div class="flex min-h-screen bg-gray-50 flex-col w-full h-full">
        @include('pages.teacher.components.navbar')
        <div class="flex flex-col max-w-[1280px] h-full flex-1 mx-auto w-full mt-6 px-4">
            <div class="flex flex-col md:flex-row w-full h-fit mt-0 justify-between items-center gap-2">
                <h1 class="font-semibold text-2xl">List Mentoring</h1>
                <div class="flex flex-row md:flex-row gap-2 w-full cursor-default md:w-fit mt-4 md:mt-0 justify-between">
                    <div class="flex flex-col md:flex-row h-fit items-center  gap-2 w-full md:w-fit">
                    
                        <form action="{{ route('teacher.mentoring') }}" method="get"><input id="keyword"
                                value="{{ Request::has('search') ? Request::query('search') : '' }}"
                                class="py-2 px-6 border-[2px] border-gray-200 rounded-lg outline-none w-full flex-1"
                                placeholder="Search..." name="search" type="text"></form>
                    </div>
                </div>

            </div>
            <div class="w-full h-full max-w-[1280px] mx-auto flex flex-grow mb-6 flex-col bg-white duration-300 ease-in-out  mt-4 min-h-[400px] rounded-lg px-6 py-4 border-[2px] overflow-x-auto"
                style="opacity: 1;">
                <table class="border-separate border-spacing-y-3">
                    <thead>
                        <tr>
                            <th class="px-4 py-4 text-left">No</th>
                            <th class="px-4 py-4 text-left">Student Name</th>
                            <th class="px-4 py-4 text-left">Question</th>
                            <th class="px-4 py-4 text-left">Question FIle</th>
                            <th class="px-4 py-4 text-left">Question Date</th>
                            <th class="px-4 py-4 text-left">Answer</th>
                            <th class="px-4 py-4 text-left">Answer FIle</th>
                            <th class="px-4 py-4 text-left">Answer Date</th>
                            <th class="px-4 py-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 rounded-xl">
                        @if (count($mentoring) == 0)
                            <td class="text-center px-4 py-2" colspan="9">No Data</td>
                        @endif
                        <form class="" id="form_delete" action="" method="post">
                            @csrf

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($mentoring as $item)
                                <tr class="" style="opacity: 1; transform: none;">
                                    <td class="text-left px-4 py-3">{{ $no }}</td>
                                    <td class="text-left px-4 py-3">
                                        {{ $item->student->first_name . ' ' . $item->student->last_name }}</td>
                                    <td class="text-left px-4 py-3">{{ $item->question }}</td>
                                    <td class="text-left px-4 py-3"><a
                                            class="border-b-[1px] border-b-blue-500 pb-1 text-blue-700"
                                            href="{{ $item->question_file_path ? '/uploads/' . $item->question_file_path : '#' }}"
                                            {{ $item->question_file_path ? 'target="_blank"' : '' }}>{{ $item->question_file_path ? $item->question_file_path : '-' }}</a>
                                    </td>
                                    <td class="text-left px-4 py-3">{{ $item->question_date }}</td>
                                    <td class="text-left px-4 py-3">{{ $item->answer ? $item->answer : '-' }}</td>
                                    <td class="text-left px-4 py-3"><a
                                            class="border-b-[1px] border-b-blue-500 pb-1 text-blue-700"
                                            href="{{ $item->answer_file_path ? '/uploads/' . $item->answer_file_path : '#' }}"
                                            {{ $item->answer_file_path ? 'target="_blank"' : '' }}>{{ $item->answer_file_path ? $item->answer_file_path : '-' }}</a>
                                    </td>
                                    <td class="text-left px-4 py-3">{{ $item->answer_date ? $item->answer_date : '-' }}
                                    </td>

                                    <td class="px-4 py-2">
                                        <div class="flex flex-row gap-2 justify-center h-full">
                                            <div onclick="setModalAnswer({{ $item }})"
                                                class="flex bg-orange-400 px-3 text-white py-3 rounded-md">Answer</div>

                                        </div>
                                    </td>

                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach


                            {{-- @foreach ($data as $item)
                                <tr style="opacity: 1; transform: none;">
                                    <td class="px-4 w-16 text-center">
                                        <div class=""><input class="h-4 w-4 idcheck" type="checkbox" name="ids[]"
                                                value="{{ $item->id }}"></div>
                                    </td>
                                    <td class="text-left px-4">{{ $item->name }}</td>
                                    <td class="text-left px-4">{{ $item->description ? $item->description : '-' }}</td>
                                    <td class="text-left px-4">
                                        <div class="h-6 w-full max-w-[80px] rounded-sm"
                                            style="background-color: {{ $item->color }}">
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="flex flex-row gap-2 justify-center h-full">
                                            <div onclick="handleEdit({{ $item }})"
                                                class="flex bg-orange-400 px-3 py-3 rounded-md"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" viewBox="0 0 24 24" color="white"
                                                    style="color:white" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path
                                                        d="M14 19.88V22h2.12l5.17-5.17-2.12-2.12zM20 8l-6-6H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H12v-2.95l8-8V8zm-7 1V3.5L18.5 9H13zM22.71 14l-.71-.71a.996.996 0 00-1.41 0l-.71.71L22 16.12l.71-.71a.996.996 0 000-1.41z">
                                                    </path>
                                                </svg></div>
                                            <div onclick="deleteData('/plant/delete/{{ $item->id }}?token={{ csrf_token() }}')""
                                                class="flex bg-red-600 px-3 py-3 rounded-md"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" viewBox="0 0 24 24" color="white"
                                                    style="color:white" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path
                                                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </form>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('otherjs')
    <script src="/js/teacher/mentoring.js"></script>
    <script src="/js/navbar.js"></script>
@endsection
