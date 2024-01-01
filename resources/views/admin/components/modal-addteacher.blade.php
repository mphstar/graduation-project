<!-- Modal overlay -->
<div id="modalOverlay" class="fixed inset-0 z-50 bg-black opacity-50 hidden"></div>

<!-- Modal content -->
<div id="modalContent"
    class="fixed inset-0 z-50 items-center justify-center hidden top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4">
    <div class="bg-white p-8 w-full max-w-md mx-auto rounded-md shadow-md">
        <form method="POST" action="{{ route('add-teacher') }}">
            @csrf
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                    required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                    required autofocus autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="teacher_id" :value="__('Teacher ID')" />
                <x-text-input id="teacher_id" class="block mt-1 w-full" type="text" name="teacher_id"
                    :value="old('teacher_id')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center mt-6">
                <button type="button" onclick="closeModal()"
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
