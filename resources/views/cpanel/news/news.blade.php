@extends('cpanel.layouts.main')

@section('content')
    <button type="button" onclick= "addNews()"
            class="flex-auto text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br
            focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg
            shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm rounded-md
            text-center md:w-32 h-14 px-5 py-2.5 w-full">
        <span class="sr-only">Add Download</span>
        Add Download
    </button>
    <div class="justify-start w-screen">
       <ul class="w-10/12">
        @foreach($News['payload'] as $news)
            <li class="flex items-center space-x-6">
                <div class="pb-3 pt-3 sm:pb-4 hover:bg-slate-600 px-2 hover:bg-opacity-30 hover:border-r-2
                border-purple-500 rounded cursor-pointer flex w-50 "  onClick = "editNews({{ $news['PostID'] }})">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 small-news-image rounded"></div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-300 truncate">
                            {{ $news['PostTitle'] }}
                        </p>
                        <p class="text-sm text-gray-300 truncate news-body-small w-60 md:w-96 text-ellipsis h-20">
                            {{ $news['PostBody'] }}
                        </p>
                    </div>
                    <div class="text-purple-400 font-medium mb-2">
                        <small>{{ $news['PostedBy'] }}, {{ $news['PostDate'] }}</small>
                    </div>
                </div>

                 <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    onClick = "deleteNews({{ $news['PostID'] }})">
                    DELETE
                </button>
            </li>
        @endforeach
        </ul>
    </div>

    @include('cpanel.news.form')

@stop



<script>
    function editNews(id)
    {
        toggleNewsForm();
        $('#newsId').val(id);
        getNewsDataForEdit(id);
    }

    function addNews()
    {
        toggleNewsForm();
        $('#newsId').val(0);
    }

    function deleteNews(id)
    {
        let url = 'news/' + id;
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

    function getNewsDataForEdit(id)
    {
        let url = '{{ route('getNews') }}/' + id;
        let finalObject = '';

        $.ajax({
            type: "GET",
            url: url,
        }).done((data) => {
            let downloadsObject = [];

            $.each(data['payload'], (index, news) => {
                console.log(news);
                $('#title').val(news.PostTitle);
                $('#body').val(news.PostBody);

                finalObject += downloadsObject;
            })
        }).fail((data) => {

        })
    }
</script>




