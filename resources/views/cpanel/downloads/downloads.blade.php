@extends('cpanel.layouts.main')

@section('content')
    <button type="button" onclick= "addDownload()"
            class="flex-auto text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br
            focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg
            shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium text-sm rounded-md
            text-center md:w-32 h-14 px-5 py-2.5 w-full">
        <span class="sr-only">Add Download</span>
        Add Download
    </button>
    <div class="justify-start w-screen">
       <ul class="">
        @foreach($Downloads['payload'] as $download)
            <li class="flex space-x-6 pb-3 pt-3 sm:pb-4">
                <div class="
                flex flex-col sm:flex-row space-x-6 border-purple-500
                hover:bg-opacity-30 hover:border-r-2 hover:bg-slate-600
                py-2 px-2 sm:py-8"
                onClick = "editDownload({{ $download['DownloadID'] }})">
                    <div class="flex-shrink-0 pl-5 sm:pl-0">
                        <div class="w-8 h-8 rounded-full download-icon"></div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{ $download['DownloadProvider'] }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        {{ $download['DownloadLink'] }}
                        </p>
                    </div>
                    <div class="text-purple-400 font-medium mb-2">
                        {{ $download['DownloadDate'] }}
                    </div>
                </div>

                <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    onClick = "deleteDownload({{  $download['DownloadID'] }})">
                    DELETE
                </button>
            </li>
        @endforeach
        </ul>
    </div>

    @include('cpanel.downloads.form')

@stop



<script>
    function editDownload(id)
    {
        toggleDownloadForm();
        $('#downloadId').val(id);
        getDownloadDataForEdit(id);
    }

    function addDownload()
    {
        toggleDownloadForm();
        $('#downloadId').val(0);
    }

    function deleteDownload(id)
    {
        let url = 'downloads/' + id;
        let finalObject = '';

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: "DELETE",
            url: url,
        }).done((data) => {
            window.location.reload();
        }).fail((data) => {

        })
    }

    function getDownloadDataForEdit(id)
    {
        let url = '{{ route('getDownloads') }}/' + id;
        let finalObject = '';

        $.ajax({
            type: "GET",
            url: url,
        }).done((data) => {
            let downloadsObject = [];

            $.each(data['payload'], (index, news) => {
                $('#provider').val(news.DownloadProvider);
                $('#link').val(news.DownloadLink);

                finalObject += downloadsObject;
            })
        }).fail((data) => {

        })
    }
</script>




