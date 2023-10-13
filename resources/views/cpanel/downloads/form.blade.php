
<div id="downloads-form-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add / Edit Download
                </h3>
                <button type="button" onClick = "toggleDownloadForm()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="downloads-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class = "px-8 py-8">
                <div class="mb-6">
                    <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provider</label>
                    <input type="provider" id="provider" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <div class="mb-6">
                    <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                    <input type="link" id="link" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>

                <input type ="text" id = "downloadId" value = "0" hidden/>

                <button type="button"
                    class="w-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                    rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2 dark:border-blue-400 dark:text-blue-400 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-900"
                    onClick = "submitDownloadCpanelForm()">
                        SAVE
                    </button>
            </form>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button"
                class="w-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2 dark:border-blue-400 dark:text-blue-400 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-900"
                onClick = "toggleDownloadForm()">
                    CLOSE
                </button>
            </div>
        </div>
    </div>
</div>


<script>
 var downloadsModalOpen = false;
    function toggleDownloadForm() {
        if(!downloadsModalOpen) {
            $('#downloads-form-modal').show();

        } else {
            $('#downloads-form-modal').hide();
            $('#downloadId').val(0);
            $('#provider').val('');
            $('#link').val('');
        }

        downloadsModalOpen = !downloadsModalOpen;
    }


    function submitDownloadCpanelForm()
    {
        $.ajax({
            type: "POST",
            data: {
                DownloadProvider: $('#provider').val(),
                DownloadLink: $('#link').val(),
                DownloadId: $('#downloadId').val(),
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: '{{ route('cpanelDownloadsPost') }}'
        }).done((data) => {
            window.location.reload();
        }).fail((data) => {

        })
    }

</script>
