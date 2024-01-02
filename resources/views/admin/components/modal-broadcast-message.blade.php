<!-- Modal overlay -->
<div id="modalOverlay" class="fixed inset-0 z-50 bg-black opacity-50 hidden"></div>

<!-- Modal content -->
<div id="modalContent"
    class="fixed inset-0 z-50 items-center justify-center hidden top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4">
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 mb-8">
                    <div class="text-center mb-4">
                        <h2 class="text-2xl font-semibold">Broadcast Message</h2>
                    </div>
                    <form method="POST" action="{{ route('broadcast-messages') }}">
                        @csrf
                        <div class="flex flex-col items-center space-y-4 mb-4">
                            <div class="w-full">
                                <label for="broadcast_title" class="block text-sm font-medium text-gray-700">Message
                                    Title</label>
                                <input id="broadcast_title" type="text" name="broadcast_title" required
                                    class="border border-gray-300 rounded-md p-2 w-full"
                                    placeholder="Enter message title" />
                            </div>

                            <div class="w-full">
                                <label for="broadcast_content" class="block text-sm font-medium text-gray-700">Message
                                    Content</label>
                                <textarea id="broadcast_content" name="broadcast_content" required
                                    class="border border-gray-300 rounded-md p-2 w-full h-24 resize-none" placeholder="Enter message content"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button id="closeModalButton" type="button"
                                class="w-full bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md m-2"
                                onclick="closeModal()">
                                Close
                            </button>
                            <button id="broadcast_button" type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md m-2">
                                Send message to teacher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
