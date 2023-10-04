
<nav class="px-2 sm:px-4 py-0 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto md:w-[1080px]">

        <a href="#" class="flex items-center pt-1 md:pt-0">
            <span class="h-6 mr-3 sm:h-9 bg-transparent" id = "website-logo"></span>
            <span class="self-center text-xl font-semibold whitespace-nowrap text-purple-300">{{ config('legionweb.server.name') }}</span>
        </a>

        <button id = "navbar-menu-collapse" type="button"
        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg
        md:hidden hover:bg-purple-100 focus:outline-none focus:ring-2 focus:ring-purple-200 dark:text-purple-400 dark:hover:bg-gray-800 dark:focus:ring-purple-600">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-menu">
            <ul class="flex flex-col px-2 rounded-lg md:flex-row md:space-x-0 md:mt-0 md:text-sm md:font-medium p-10 md:p-0" id = "navigation-buttons">
                <li>
                    <button id="sidebar-interact" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button"
                            class="flex-auto text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg
                                shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                        <span class="sr-only">REGISTER</span>
                        REGISTER
                    </button>
                </li>
                <li>
                    <button id="download-interact" type="button"
                                class="flex-auto text-white bg-gradient-to-r from-purple-700 via-purple-600 to-purple-500 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg
                                shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                        <span class="sr-only">DOWNLOAD</span>
                        DOWNLOAD
                    </button>
                </li>
                <li>
                    <button id="community-interact-forum" type="button"
                                class="flex-auto text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg
                                shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                        <span class="sr-only">FORUM</span>
                        FORUM
                    </button>
                </li>
                <li>
                    <button id="community-interact-discord" type="button"
                                class="flex-auto text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg
                                shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                        <span class="sr-only">DISCORD</span>
                        DISCORD
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>

    $("#download-interact").on("click", () => {
        toggleDownloadsModal();
    })

    let navbarCollapsed = true;
    $("#navbar-menu-collapse").on("click", function () {

        let navbarElement = $("#navbar-menu");

        if(navbarCollapsed) {
            navbarElement.removeClass('hidden');
        } else {
            navbarElement.addClass('hidden');
        }

        navbarCollapsed = !navbarCollapsed;

    })

    $("#community-interact-forum").on("click", () => {
        let communityUrl = "https://forum.mu-classic.org/";
        window.open(communityUrl, '_blank').focus();
    })

    $("#community-interact-discord").on("click", () => {
        let communityUrl = "https://discord.gg/rKRm9xZvfu";
        window.open(communityUrl, '_blank').focus();
    })
</script>
