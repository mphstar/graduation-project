@extends('layouts.app')

@section('content')
    <!-- Include the sidebar content -->
    @include('layouts.admin-sidebar')

    <!-- Ucapan selamat Datang Dan Hari Ini -->
    <div class="pl-64 pt-7">

        <div class="grid gap-1">
            <div class="p-4 mt-6">
                <h2 class="text-slate-900 text-3xl tracking-tight font-bold mb-3 dark:text-slate-200">
                    Hello!, Admin
                </h2>
                <div class="text-neutral-600 font-medium flex justify-between">
                    <span class="text-left">
                        Welcome Back! Have a nice day.
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="p-4">
                    <div class="rounded-lg shadow-sm bg-zinc-600  border pt-6 pb-6">
                        <span class="pl-5 text-lg font-normal text-white">
                            Total Questions
                        </span>
                        <span class="block pl-5 text-2xl font-semibold text-white">
                            <p id="totalQuestion">{{ $data['all']['question'] }}</p>
                        </span>
                    </div>
                </div>

                <div class="p-4">
                    <div class="rounded-lg shadow-sm bg-zinc-600  border pt-6 pb-6">
                        <span class="pl-5 text-lg font-normal text-white">
                            Total Answers
                        </span>
                        <span class="block pl-5 text-2xl font-semibold text-white">
                            <p id="totalAnswer">{{ $data['all']['answer'] }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 mt-2">
            <h2 class="font-black text-xl">
                Frequency Graph
            </h2>

            <div class="relative inline-block text-left mt-4 mb-6">
                <div>
                    <select onchange="handleChange(this, {{ json_encode($data) }})" class="border-gray-500 rounded-lg" name="" id="">
                        <option value="all">All</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                    {{-- <button type="button"
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Sort By :
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button> --}}
                </div>

                {{-- <div class=" right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-0">Daily</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-1">Weekly</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-2">Monthly</a>
                    </div>
                </div> --}}
            </div>

            <div class="mt-6 w-full min-h-96" style="width: 90%; margin: auto;">
                <div id="myChart"></div>
            </div>

        </div>
    </div>
@endsection

@section('otherjs')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('js/admin/chart.js') }}" defer></script>
@endsection
