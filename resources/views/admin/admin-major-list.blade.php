@extends('layouts.app')

@section('content')
    @include('layouts.admin-sidebar')
    @include('admin.components.modal-addmajor')
    @include('admin.components.modal-updatemajor')

    <div class="pl-64 pt-7">

        <div class="p-4 mt-6">

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

            <div class="py-12">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <table id="my-table" class="min-w-full divide-y divide-gray-200">
                                <div class="flex justify-between items-center mb-4">
                                    <p class="pt-2 pb-4 font-bold">
                                        Student List
                                    </p>
                                    <button onclick="openModalAddMajor()"
                                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-zinc-600 dark:hover:bg-zinc-700 dark:focus:ring-zinc-800">
                                        Add Major
                                    </button>
                                </div>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Major
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($majors as $major)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $major->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex px-3">
                                                    <button
                                                        class="edit-btn flex items-center bg-gray-200 hover:bg-gray-100 text-gray-500 hover:text-blue-500 font-semibold py-1 px-4 mx-1 border border-gray-300 rounded shadow"
                                                        onclick="openModalUpdateMajor({{ $major->id }}, '{{ $major->name }}')">
                                                        <svg class="mx-1 stroke-current hover:text-blue-500"
                                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                            viewBox="0 0 24 24" fill="none" stroke="#000000"
                                                            stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
                                                            </path>
                                                            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                                                        </svg>
                                                        <span class="mx-1 pr-2">Update</span>
                                                    </button>

                                                    <form action="{{ route('major-destroy', $major->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="flex items-center bg-gray-200 hover:bg-gray-100 text-gray-500 hover:text-red-500 font-semibold py-1 px-4 mx-1 border border-gray-300 rounded shadow delete-btn">
                                                            <svg class="mx-1 stroke-current hover:text-red-500"
                                                                xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" viewBox="0 0 24 24" fill="none"
                                                                stroke="#000000" stroke-width="1" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10"
                                                                    y2="17"></line>
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17"></line>
                                                            </svg>
                                                            <span class="mx-1 pr-2">Delete</span>
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
    <script src="/js/admin/modalmajor.js"></script>
    <script src="/js/admin/search-major.js"></script>
    <script src="/js/admin/toast-delete.js"></script>
@endsection
