@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-50 flex-col w-full h-full">
        @include('pages.student.components.navbar')
        <div class="flex flex-col md:flex-row gap-10 max-w-[1280px] mx-auto mt-4 w-full px-4">
            <div class="md:p-10">
                <img class="rounded-full w-40 h-40 flex" src="https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png" alt="profile">
            </div>
            <div class="flex flex-col flex-1 pb-8">
                <h1 class="font-bold text-2xl">Edit Profile</h1>
                <form action="{{ route('student.profile.update') }}" method="post">
                    @csrf
                    <div class="flex-col md:flex-row flex gap-3 mt-4">
                        <div class="flex flex-col flex-1">
                            <label for="first_name">First Name</label>
                            <input class="px-3 rounded-lg border-gray-300" value="{{ $user->student->first_name }}"
                                name="first_name" id="first_name" type="text" placeholder="">
                            @error('first_name')
                                <span class="text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="last_name">Last Name</label>
                            <input class="px-3 rounded-lg border-gray-300" name="last_name" id="last_name"
                                value="{{ $user->student->last_name }}" type="text" placeholder="">
                            @error('last_name')
                                <span class="text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="flex flex-col flex-1 mt-3">
                        <label for="student_id">Student ID Number</label>
                        <input value="{{ $user->student->student_id }}" class="px-3 rounded-lg border-gray-300"
                            id="student_id" name="student_id" type="text" placeholder="">
                    </div>
                    <div class="flex flex-col flex-1 mt-3">
                        <label for="email">Email</label>
                        <input value="{{ $user->email }}" class="px-3 rounded-lg border-gray-300" id="email"
                            name="email" type="text" placeholder="">
                        @error('email')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 mt-3">
                        <label for="major">Major</label>
                        <select class="px-3 rounded-lg border-gray-300" name="major" id="major">
                            <option disabled selected value=""></option>
                            @foreach ($major as $item)
                                <option {{ $item->id == $user->student->major_id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-col md:flex-row flex gap-3 mt-4">
                        <div class="flex flex-col flex-1">
                            <label for="gender">Gender</label>
                            <select class="px-3 rounded-lg border-gray-300" name="gender" id="gender">
                                <option disabled selected value=""></option>
                                <option {{ $user->student->gender == 'male' ? 'selected' : '' }} value="male">Male
                                </option>
                                <option {{ $user->student->gender == 'female' ? 'selected' : '' }} value="female">Female
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="datebirth">Date of Birth</label>
                            <input value="{{ $user->student->date_of_birth }}" class="px-3 rounded-lg border-gray-300"
                                id="datebirth" name="datebirth" type="date" placeholder="">
                        </div>
                    </div>
                    <button
                        class="bg-green-500 py-2 text-white rounded-md mt-4 w-full md:w-fit px-12 mb-4 hover:bg-green-600">Save</button>
                </form>


                <form action="{{ route('student.profile.update_password') }}" method="post">
                    @csrf
                    <h1 class="font-bold text-2xl mt-6">Edit Password</h1>

                    <div class="flex flex-col flex-1 mt-3">
                        <label for="password">New Password</label>
                        <input class="px-3 rounded-lg border-gray-300" id="password" name="password" type="password"
                            placeholder="">
                        @error('password')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 mt-3">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input class="px-3 rounded-lg border-gray-300" id="password_confirmation"
                            name="password_confirmation" type="password" placeholder="">
                    </div>

                    <button type="submit"
                        class="bg-green-500 py-2 text-white rounded-md mt-4 w-full md:w-fit px-12 mb-4 hover:bg-green-600">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('otherjs')
    <script src="/js/navbar.js"></script>
@endsection
