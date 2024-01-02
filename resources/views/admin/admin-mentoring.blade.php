@extends('layouts.app')

@section('content')
    @include('layouts.admin-sidebar')

    <div class="pl-64 pt-7">

        <div class="p-4 mt-6">
            <h2 class="text-2xl font-semibold mb-4 text-center">Mentoring QNA Message List</h2>
            <div>
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <table id="my-table" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Student
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Question Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Mentor
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($mentors as $mentor)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $mentor->student->first_name }} {{ $mentor->student->last_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $mentor->question_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $mentor->student->teacher->first_name }}
                                                {{ $mentor->student->teacher->last_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex px-3">
                                                    <form
                                                        action="{{ route('remind-teacher', ['teacherId' => $mentor->student->teacher_id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="teacher_id"
                                                            value="{{ $mentor->student->teacher_id }}">
                                                        <input type="hidden" name="name"
                                                            value="{{ $mentor->student->teacher->first_name }} {{ $mentor->student->teacher->last_name }}">
                                                        <input type="hidden" name="email"
                                                            value="{{ $mentor->student->teacher->user->email }}">
                                                        <button type="submit"
                                                            class="flex items-center bg-blue-600 hover:bg-red-600 text-white hover:text-white font-semibold py-1 px-4 mx-1 border border-gray-300 rounded shadow delete-btn">
                                                            <svg class="mx-1 stroke-current hover:text-white"
                                                                xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" viewBox="0 0 24 24" fill="none"
                                                                stroke="#000000" stroke-width="1" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </svg>
                                                            <span class="mx-1 pr-2">Remind the teacher</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('otherjs')
@endsection
