   <nav class="container p-3 mx-auto md:p-0 md:mt-10 max-w-6xl ">
     <div class="flex items-center justify-between md:hidden  border-b-2 pb-3 border-y-blue-400 px-10" >
       <span class="h-6 mr-3 sm:h-9 bg-transparent md:hidden" id="website-logo"></span>
       <span id="menu-button" class="w-7 h-7 md:hidden text-blue-500 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-deep" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 6h16"></path>
            <path d="M7 12h13"></path>
            <path d="M10 18h10"></path>
        </svg>
       </span>
     </div>
     <div class="hidden md:block" id="menu">
       <div class="grid grid-cols-1 md:grid-cols-9">
         <div class="col-span-4 text-lg md:border-y border-y-slate-800">
           <ul class="justify-between md:p-4 md:flex">
             <li>
               <button id="sidebar-interact" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="flex-auto text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg
                                shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                 <span class="sr-only">REGISTER</span>
                 REGISTER
               </button>
             </li>
             <li>
               <button id="download-interact" type="button" class="flex-auto text-white bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg
                                shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                 <span class="sr-only">DOWNLOAD</span>
                 DOWNLOAD
               </button>
             </li>
           </ul>
         </div>
         <div class="hidden md:block">
           <div class="flex items-center justify-center ">
             <div class="p-3">
               <span class="h-6 sm:h-9 bg-transparent" id="website-logo"></span>
             </div>
           </div>
         </div>
         <div class="col-span-4 text-lg md:border-y border-y-slate-800">
           <ul class="justify-between md:p-4 md:flex">
             <li>
               <button id="connect-interact" type="button" class="flex-auto text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg
                                shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                 <span class="sr-only">CONNECT</span>
                 CONNECT
               </button>
             </li>
             <li>
               <button id="community-interact-discord" type="button" class="flex-auto text-white bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 hover:bg-gradient-to-br
                                focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg
                                shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm
                                text-center md:w-32 h-14 px-5 py-2.5 w-full">
                 <span class="sr-only">DISCORD</span>
                 DISCORD
               </button>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </nav>

   <script>
     const menubtn = document.getElementById('menu-button');
     const menu = document.getElementById('menu');
     menubtn.addEventListener('click', () => {
       menu.classList.toggle('hidden');
     })

     $("#download-interact").on("click", () => {
       toggleDownloadsModal();
     })

     $("#connect-interact").on("click", () => {
       toggleHowToConnectModal();
     })

     let navbarCollapsed = true;
     $("#navbar-menu-collapse").on("click", function() {

       let navbarElement = $("#navbar-menu");

       if (navbarCollapsed) {
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
