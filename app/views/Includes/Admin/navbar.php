<nav class="w-full bg-primary py-1.5 px-5">

    <div class="navbar flex items-center justify-between">
        <div class="flex items-center">
            <!-- burgder Menu  -->
            <div class="mr-2 w-fit-content border-1">
                <button class="flex items-center p-1 rounded-lg outline-none focus:outline-white " id="sidebarMenu">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <form action="">
                <div class="relative w-[350px] ml-[10px]">
                    <input type="text" name="" id="" class="block w-full pl-5 focus:outline-white placeholder:text-sm border border-white text-sm outline-none py-1 rounded-lg" placeholder="Search..." />
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-[50%] text-primary right-[10px] translate-y-[-50%]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </form>
        </div>
        <div class="flex items-center">


            <button class="btn btn-ghost btn-circle mr-3">
                <div class="indicator text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
            <div class="flex items-center">
                <img src="<?= URLROOT  ?>/assets/upload/vector.png" alt="Photo" class="w-[35px] h-[35px] rounded-full mr-1" />
                <div class="text-sm text-white font-semibold text-center">
                    <p><?= $_SESSION['username'] ?></p>
                    <span class="text-white text-sm"><?= $_SESSION['roleofuser'] ?></span>
                </div>
            </div>
        </div>
    </div>
</nav>