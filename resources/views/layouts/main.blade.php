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

<body class="">
  <div class="" id="website-background"></div </div>
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
    @include('layouts.navigation')
    <div class="bg-opacity-90 max-w-6xl mx-auto pt-20" id="content-holder">

      {{-- NAV BUTTONS --}}
      @include('modals.downloads')
      @include('modals.howto')
      @include('modals.news_view')

      {{-- TOP PAGE GADGETS --}}
      @if(config('legionweb.server.about.enableStatsGadget'))
      @include('layouts.gadgets.statsGadget')
      @endif

      <div class="bg-slate-800 mt-10">
        @if(isset($LatestNews) && $LatestNews)
        <div id="latest-news" class="px-10">
          @include('layouts.news', ['news' => $LatestNews])
        </div>
        @endif
      </div>
      <div class="w-full flex-row space-x-5 md:flex pt-5 text-white mb-32">
        <div class="basis-8/12 md:px-10 bg-slate-800 rounded-none md:rounded-r-lg">
          @section('content')

          @show
        </div>

        {{-- STATISTICS SIDE --}}
        <div class="basis-4/12 pr-5 md:pr-0 mt-5 md:mt-0">
          @include("layouts.sidecards")

          <p class="text-sm text-slate-900 text-right mr-2">
            &copy; {{ config('legionweb.server.name') }}
            | Powered by <a href="https://github.com/razvanbackpack/legionweb" target="_blank" class="font-bold text-green-900"> {{ config('legionweb.core.name') }} v{{ config('legionweb.core.version') }} &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github float-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
              </svg>
            </a>
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
