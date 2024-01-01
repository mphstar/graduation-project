<!-- Modal overlay -->
<div id="modalOverlayUpdate" class="fixed inset-0 z-50 bg-black opacity-50 hidden"></div>

<!-- Modal content -->
<div id="modalContentUpdate"
    class="fixed inset-0 z-50 items-center justify-center hidden top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4">
    <div class="bg-white p-8 w-full max-w-md mx-auto rounded-md shadow-md">
        <form method="POST" action="{{ route('update-teacher') }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="update_id" value="">
            <div>
                <x-input-label for="update_first_name" :value="__('First Name')" />
                <x-text-input id="update_first_name" class="block mt-1 w-full" type="text" name="update_first_name"
                    :value="old('update_first_name')" required autofocus autocomplete="update_first_name" />
                <x-input-error :messages="$errors->get('update_first_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="update_last_name" :value="__('Last Name')" />
                <x-text-input id="update_last_name" class="block mt-1 w-full" type="text" name="update_last_name"
                    :value="old('update_last_name')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('update_last_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="update_teacher_id" :value="__('Teacher ID')" />
                <x-text-input id="update_teacher_id" class="block mt-1 w-full" type="text" name="update_teacher_id"
                    :value="old('update_teacher_id')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('update_teacher_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="update_major_id" :value="__('Major')" />
                <select id="update_major_id" name="update_major_id"
                    class="block mt-1 w-full border-gray-300 rounded-md p-2 whitespace-normal">
                    <option value="">Select Major</option>
                    @foreach (\App\Models\Major::getDropdownList() as $majorId => $majorName)
                        <option value="{{ $majorId }}">{{ $majorName }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('update_major_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="update_password" class="block mt-1 w-full" type="password" name="update_password"
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('update_password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="update_password_confirmation" class="block mt-1 w-full" type="password"
                    name="update_password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('update_password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center mt-6">
                <button type="button" onclick="closeUpdateModal()"
                    class="bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-zinc-300 text-white font-medium rounded-lg w-full text-sm px-4 py-2 my-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-zinc-800">
                    Cancel
                </button>

                <button type="submit"
                    class="bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 text-white font-medium rounded-lg w-full text-sm px-4 py-2 my-2 dark:bg-zinc-600 dark:hover:bg-zinc-700 dark:focus:ring-zinc-800">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
