<html>
    <head>
        <title>
            CPANEL - {{ config('ftweb.server.name') }}
            {{ config('ftweb.server.version') }}
        </title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body class="bg-slate-800">
        <div class="mx-auto">
            {{-- MAIN CONTENT --}}
            {{--
                @section('content') GOES HERE
             --}}
            <div class="bg-slate-800 bg-opacity-90 h-full max-w-6xl mx-auto pt-20" id="content-holder">

                {{-- NAV BUTTONS --}}
                @include('cpanel.layouts.navigation')

                <div class="w-full flex-row space-x-5 md:flex pt-20 text-white">
                    <div class="px-10 md:px-0 md:pl-10 mx-auto">
                        @section('content')

                        @show
                    </div>
                </div>
            </div>

        </div>
    </body>

</html>


{{-- JS --}}
<script>
    @yield('js')
</script>

