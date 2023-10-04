
<div class="grid mb-1 rounded-l-lg shadow-sm md:mb-4 md:grid-cols-1">
    <figure class="flex flex-col justify-left py-2 text-left rounded-t-lg md:rounded-t-none md:rounded-tl-lg bg-gray-800 border-gray-700">
        <blockquote class="mb-2 text-gray-500">
            <h3 class="pl-3 flex justify-left text-lg font-semibold text-white border-b border-purple-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook mr-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
                    <path d="M13 8l2 0"></path>
                    <path d="M13 12l2 0"></path>
                </svg>
                ABOUT
            </h3>
        </blockquote>

        @if(config('legionweb.server.about.enableOnlineGadget'))
            <figcaption class="flex justify-center space-x-0 mb-3">
                @include('layouts.gadgets.onlineGadget')
            </figcaption>
        @endif

        <figcaption class="flex justify-center ml-5 space-x-0">
            <div class="w-full">
                <div class="font-medium text-white text-left">
                    <div>EXP. Rate:</div>
                </div>
                <div class="font-medium text-white text-left">
                    <div>x{{ config('legionweb.server.about.expRate') }}</div>
                    <div class="text-sm text-gray-200"></div>
                </div>
            </div>

            <div class="w-full">
                <div class="font-medium text-white text-left">
                    <div>Drop Rate:</div>
                </div>
                <div class="font-medium text-white text-left">
                    <div>x{{ config('legionweb.server.about.dropRate') }}</div>
                    <div class="text-sm text-gray-200"></div>
                </div>
            </div>
        </figcaption>

        @if(config('legionweb.server.about.enableRankingGadget'))
            <figcaption class="flex justify-center space-x-0 mb-3">
                @include('layouts.gadgets.onlineRankingGadget')
            </figcaption>
        @endif

    </figure>
</div>



