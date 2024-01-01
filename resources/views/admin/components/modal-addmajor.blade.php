<!-- Modal overlay -->
<div id="modalOverlayAddMajor" class="fixed inset-0 z-50 bg-black opacity-50 hidden"></div>

<!-- Modal content -->
<div id="modalContentAddMajor"
    class="fixed inset-0 z-50 items-center justify-center hidden top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4">
    <div class="bg-white p-8 w-full max-w-md mx-auto rounded-md shadow-md">
        <form method="POST" action="{{ route('add-major') }}">
            @csrf
            <div>
                <x-input-label for="add_name" :value="__('Major Name')" />
                <x-text-input id="add_name" class="block mt-1 w-full" type="text" name="add_name" :value="old('add_name')"
                    required autofocus autocomplete="add_name" />
                <x-input-error :messages="$errors->get('add_name')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center mt-6">
                <button type="button" onclick="closeModalAddMajor()"
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
