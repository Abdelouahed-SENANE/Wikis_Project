<?php include APPROOT . '/views/Includes/Admin/header.php' ?>

<?php include APPROOT . '/views/Includes/Admin/sidebar.php' ?>

<main class="flex-1 w-full bg-slate-100">
    <?php include APPROOT . '/views/Includes/Admin/navbar.php' ?>

    <!-- component -->
    <section class="  p-5 mx-5 my-5 rounded-lg shadow-lg shadow-slate-200/50 bg-white">
        <div id="overlayForm" class="bg-slate-800 bg-opacity-60 hidden w-full h-full z-[10] flex items-center justify-center backdrop-blur-sm absolute top-0 left-0">

            <!-- ============== Form to Admin -->
            <form class=" bg-white w-[600px] rounded-xl p-5 relative" id="formAdmin">
                <div class="absolute top-2 right-2 cursor-pointer" id="closeBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 text-meduim">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>

                </div>
                <div>
                    <h2 class="text-2xl font-medium text-primary text-center">Form Categories</h2>
                </div>
                <div>
                    <!-- <input type="hidden" name="csrf_token" value="<?= $data['token'] ?>"> -->
                </div>
                <div class="py-2">
                    <label for="username" class="block mb-2 text-sm font-medium ">Category name</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-primary border border-e-0  rounded-s-md ">
                            <svg clip-rule="evenodd" class="w-4 h-4 text-white" fill-rule="evenodd" stroke-linejoin="round" fill="currentColor" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="m20.998 8.498h-17.996c-.569 0-1.001.464-1.001.999 0 .118-.105-.582 1.694 10.659.077.486.496.842.988.842h14.635c.492 0 .911-.356.988-.842 1.801-11.25 1.693-10.54 1.693-10.66 0-.558-.456-.998-1.001-.998zm-.964-3.017h-16.03c-.524 0-1.001.422-1.001 1.007 0 .081-.01.016.14 1.01h17.752c.152-1.012.139-.931.139-1.009 0-.58-.469-1.008-1-1.008zm-15.973-1h15.916c.058-.436.055-.426.055-.482 0-.671-.575-1.001-1.001-1.001h-14.024c-.536 0-1.001.433-1.001 1 0 .056-.004.043.055.483z" fill-rule="nonzero" />
                            </svg>
                        </span>
                        <input type="text" id="nameCategory" name="name" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5      dark:focus:ring-blue-500 " placeholder="Enter name category">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="nameErr"></span>
                </div>
                <div class="py-2">
                    <label for="email" class="block mb-2 text-sm font-medium ">Category Description </label>
                    <div class="flex">

                        <textarea id="categoryDesc" name="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:placeholder-gray-400 resize-none" placeholder="Write your thoughts here..."></textarea>

                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="descErr"></span>

                </div>
                <div class="text-center">
                    <button type="submit" name="addAdmin" class="bg-primary hover:bg-orange-600 text-white font-meduim py-2 px-12 mt-5 rounded-full">
                        Submit
                    </button>
                </div>
            </form>

        </div>
        <!-- ============= Message Show =============== -->
        <p class="p-2 text-rose-500 bg-rose-100 hidden" id="deleteMessage"></p>
        <p class="p-2 text-green-500 bg-green-100 hidden" id="addMessage"></p>
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-x-3">
                    <h2 class="text-2xl uppercase font-medium text-gray-800 t">Users</h2>
                </div>

            </div>

            <div class="flex items-center mt-4 gap-x-3">

                <button id="openBtn" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-primary rounded-md shrink-0 sm:w-auto gap-x-2 hover:bg-orange-400  ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Add Admin</span>
                </button>
            </div>
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between">
            <!-- <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                View all
            </button>

            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Monitored
            </button>

            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Unmonitored
            </button>
        </div> -->

            <div class="relative flex items-center mt-4 md:mt-0">
                <span class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-orange-600 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>

                <input type="text" id="search_users" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-orange-300 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5  dark:text-gray-700  focus:border-orange-400 focus:border-orange-500 focus:ring-orange-500 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>
        </div>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-orange-200  md:rounded-lg">
                        <table class="min-w-full divide-y divide-orange-500">
                            <thead class="bg-orange-500 ">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-white">
                                        <span>ID_user</span>
                                    </th>

                                    <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                        Image user
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                        Username
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">Email</th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">Joined at</th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-orange-200 " id="users-container">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
            <div class="text-sm text-gray-500">
                Page <span class="font-medium text-gray-700 0">1 of 10</span>
            </div>

            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-white capitalize transition-colors duration-200 bg-primary  rounded-md sm:w-auto gap-x-2 hover:bg-orange-400  ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>

                    <span>
                        prev
                    </span>
                </a>

                <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-white capitalize transition-colors duration-200 bg-primary  rounded-md sm:w-auto gap-x-2 hover:bg-orange-400 ">
                    <span>
                        Next
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>




















</main>
<script type="module" src="<?php echo URLROOT ?>/js/admin/categories.js"></script>
<?php include APPROOT . '/views/Includes/Admin/footer.php' ?>