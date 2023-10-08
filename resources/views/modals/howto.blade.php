<div id="howtoconnect-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    How to Connect
                </h3>
                <button type="button" onClick = "toggleHowToConnectModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="downloads-modal" onClick = "toggleHowToConnectModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700" id ="downloads-holder">

                </ul>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button"
                class="w-full text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium
                rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-900"
                onClick = "toggleHowToConnectModal()">
                    CLOSE
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    var howtoconnectModalOpen = false;
    function toggleHowToConnectModal() {
        if(!howtoconnectModalOpen) {
            $('#howtoconnect-modal').show();
        } else {
            $('#howtoconnect-modal').hide();
        }

        howtoconnectModalOpen = !howtoconnectModalOpen;
    }
</script>
