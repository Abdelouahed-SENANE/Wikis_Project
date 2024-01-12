<!-- Main navigation container -->
<header class="shadow-sm ">
    <div class="container mx-auto w-[80%]  ">
        <nav class="relative flex w-full flex-nowrap items-center justify-between  py-2 hover:text-neutral-700 focus:text-neutral-700  lg:flex-wrap lg:justify-start lg:py-3" data-te-navbar-ref>
            <div class="flex w-full flex-wrap items-center justify-between px-3">
                <div class="ml-2">
                    <a class="text-xl text-neutral-800 flex items-center gap-2" href="#">
                        <img src="<?= URLROOT ?>/assets/images/logo.png" alt="logo" class="w-7 h-7">
                        <span class="font-[poppins] text-base font-bold">Wi-Blogs</span>
                    </a>
                </div>
                <!-- Hamburger button for mobile view -->
                <button id="burger_menu" class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0  lg:hidden" type="button" data-te-collapse-init data-te-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent3" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Hamburger icon -->
                    <span class="[&>svg]:w-7">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>

                <!-- Collapsible navbar container -->
                <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto" id="navbarSupportedContent3" data-te-collapse-item>
                    <!-- Left links -->
                    <div class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row" data-te-navbar-nav-ref>
                        <!-- Home link -->
                        <div class="my-4 pl-2 lg:my-0 lg:pl-2 lg:pr-1" data-te-nav-item-ref>
                            <a class="active lg:px-2 [&.active]:text-black" aria-current="page" href="<?= URLROOT ?>/pages/index" data-te-nav-link-ref>Home</a>
                        </div>
                        <!-- Features link -->
                        <div class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                            <a class="p-0 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 motion-reduce:transition-none lg:px-2" href="<?= URLROOT ?>/visitor/tags" data-te-nav-link-ref>Tags</a>
                        </div>
                        <!-- Pricing link -->
                        <div class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                            <a class="p-0 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 motion-reduce:transition-none lg:px-2" href="#" data-te-nav-link-ref>Article</a>
                        </div>
                        <div class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                            <a class="p-0 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none lg:px-2" href="#" data-te-nav-link-ref>Help</a>
                        </div>

                    </div>
                    <div class=" flex flex-col mt-5 items-start  gap-3 lg:flex lg:flex lg:flex-row lg:items-center lg:mt-0 lg:gap-0">
                        <?php if (isset($_SESSION['roleofuser'])) { ?>
                            <button class="mr-2">
                                <a href="<?= URLROOT ?>/pages/login" class="px-5 py-2 border border-primary transition duration-200 hover:bg-primary text-base rounded-full">Login</a>
                            </button>
                        <?php } else { ?>
                            <button class="mr-2">
                                <a href="<?= URLROOT ?>/pages/login" class="px-5 py-2 border border-primary transition duration-200 hover:bg-primary text-base rounded-full">Login</a>
                            </button>
                            <button class="px-5 block text-white py-2 bg-primary text-base  rounded-full">
                                <a href="<?= URLROOT ?>/pages/register">Register</a>
                            </button>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </nav>
    </div>
</header>