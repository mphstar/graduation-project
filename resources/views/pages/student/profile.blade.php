@extends('layouts.app')

@section('content')
    
    <div class="flex min-h-screen bg-gray-50 flex-col w-full h-full">
        @include('pages.student.components.navbar')
        <div class="flex flex-col md:flex-row gap-10 max-w-[1280px] mx-auto mt-4 w-full px-4">
            <div class="md:p-10">
                <img class="rounded-full w-40 h-40 flex" src="https://picsum.photos/200/300" alt="profile">
            </div>
            <div class="flex flex-col flex-1 pb-8">
                <h1 class="font-bold text-2xl">Edit Profile</h1>
                <div class="flex-col md:flex-row flex gap-3 mt-4">
                    <div class="flex flex-col flex-1">
                        <label for="first_name">First Name</label>
                        <input class="px-3 rounded-lg border-gray-300" name="first_name" id="first_name" type="text"
                            placeholder="">
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="last_name">Last Name</label>
                        <input class="px-3 rounded-lg border-gray-300" name="last_name" id="last_name" type="text"
                            placeholder="">
                    </div>

                </div>
                <div class="flex flex-col flex-1 mt-3">
                    <label for="student_id">Student ID Number</label>
                    <input class="px-3 rounded-lg border-gray-300" id="student_id" name="student_id" type="text"
                        placeholder="">
                </div>
                <div class="flex flex-col flex-1 mt-3">
                    <label for="email">Email</label>
                    <input class="px-3 rounded-lg border-gray-300" id="email" name="email" type="text"
                        placeholder="">
                </div>
                <div class="flex flex-col flex-1 mt-3">
                    <label for="major">Major</label>
                    <select class="px-3 rounded-lg border-gray-300" name="major" id="major">
                        <option value="tif">Informatics Engineering</option>
                    </select>
                </div>
                <div class="flex-col md:flex-row flex gap-3 mt-4">
                    <div class="flex flex-col flex-1">
                        <label for="gender">Gender</label>
                        <select class="px-3 rounded-lg border-gray-300" name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="datebirth">Date of Birth</label>
                        <input class="px-3 rounded-lg border-gray-300" id="datebirth" name="datebirth" type="date"
                            placeholder="">
                    </div>
                </div>
                <button
                    class="bg-green-500 py-2 text-white rounded-md mt-4 w-full md:w-fit px-12 mb-4 hover:bg-green-600">Save</button>


                <h1 class="font-bold text-2xl mt-6">Edit Password</h1>

                <div class="flex flex-col flex-1 mt-3">
                    <label for="new_password">New Password</label>
                    <input class="px-3 rounded-lg border-gray-300" id="new_password" name="new_password" type="text"
                        placeholder="">
                </div>
                <div class="flex flex-col flex-1 mt-3">
                    <label for="confirm_password">Confirm New Password</label>
                    <input class="px-3 rounded-lg border-gray-300" id="confirm_password" name="confirm_password"
                        type="text" placeholder="">
                </div>

                <button
                    class="bg-green-500 py-2 text-white rounded-md mt-4 w-full md:w-fit px-12 mb-4 hover:bg-green-600">Save</button>

            </div>
        </div>
    </div>
@endsection

@section('otherjs')
    <script src="/js/navbar.js"></script>
@endsection
