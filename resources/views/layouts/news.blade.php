<div class="grid grid-rows-3 grid-flow-col gap-4
            pl-4 pr-4 pt-8 pb-0
            hover:bg-slate-600 hover:bg-opacity-30 hover:border-r-2 border-purple-500 rounded
            cursor-pointer" onClick = "toggleNewsView({{ $LatestNews['PostID'] ?? 0 }})">

    <div class="row-span-3">
        <div class="relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg mb-3" data-mdb-ripple="true" data-mdb-ripple-color="light">
            <div class="w-36 h-36" id ="latest-news-image"></div>
        </div>
    </div>

    <div class="col-span-2">
        <h5 class="text-lg font-bold mb-3 text-gray-300">{{ $news['PostTitle'] }}</h5>
        <div class="mb-1 text-purple-400 font-medium text-sm flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle mr-2" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
            {{ $news['PostedBy'] }}, &nbsp;<small>{{ $news['PostDate'] }}</small>
        </div>
    </div>

    <div class="row-span-2 col-span-2 mr-1 news-body text-gray-300">
        {!! $news['PostBody'] !!}
    </div>
</div>
