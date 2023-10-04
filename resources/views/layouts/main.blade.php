<!DOCTYPE html>
    <head>
        <title>
            {{ config('legionweb.server.name') }}
            {{ config('legionweb.server.version') }}

            {{ $PAGETITLE ?? ""}}
        </title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body class="bg-slate-800">
        {{-- SIDEBAR --}}
        {{--
            @section('sidebar') GOES HERE
            YOU ONLY NEED TO TWEAK THESE IF YOU CHANGE HOW IT LOOKS
        --}}
        <div class="flex">
            <aside id="legionweb-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full" aria-label="Sidebar" data-visible="false">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 ">
                @include('forms.register')
                @section('sidebar')

                @show
                 </div>
            </aside>
        </div>
        <div class="mx-auto">
            {{-- MAIN CONTENT --}}
            {{--
                @section('content') GOES HERE
             --}}
            <div class="bg-opacity-90 max-w-6xl mx-auto pt-20" id="content-holder">

                {{-- NAV BUTTONS --}}
                @include('layouts.navigation')
                @include('modals.downloads')
                @include('modals.news_view')

                {{-- TOP PAGE GADGETS --}}
                @if(config('legionweb.server.about.enableStatsGadget'))
                    @include('layouts.gadgets.statsGadget')
                @endif

                <div class="bg-slate-800">
                    @if(isset($LatestNews) && $LatestNews)
                        <div id = "latest-news" class="px-10">
                            @include('layouts.news', ['news' => $LatestNews])
                        </div>
                    @endif
                </div>
                <div class="w-full flex-row space-x-5 md:flex pt-5 text-white mb-32">
                    <div class="basis-8/12 px-10 md:px-0 md:pl-10">
                        @section('content')

                        @show
                    </div>

                    {{-- STATISTICS SIDE --}}
                    <div class="basis-4/12 pr-5 md:pr-0 mt-5 md:mt-0">
                        @include("layouts.sidecards")

                        <p class="text-sm text-purple-400 text-right mr-2">
                            &copy; {{ config('legionweb.server.name') }}
                            | Powered by {{ config('legionweb.core.name') }} v{{ config('legionweb.core.version') }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </body>

</html>


{{-- JS --}}
<script>
    $('#sidebar-interact').on('click', () => {
        sidebarControl();
    })

    @yield('js')
</script>
@include('global_js')
