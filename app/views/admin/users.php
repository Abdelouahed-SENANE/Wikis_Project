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
                    <h2 class="text-2xl font-medium text-primary text-center">Form Admin</h2>
                </div>
                <div class="py-2">
                    <label for="username" class="block mb-2 text-sm font-medium ">Username</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-primary border border-e-0  rounded-s-md ">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input type="text" id="username" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5      dark:focus:ring-blue-500 " placeholder="Enter username">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="usernameErr"></span>
                </div>
                <div class="py-2">
                    <label for="email" class="block mb-2 text-sm font-medium ">Email</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm  bg-primary border border-e-0  rounded-s-md ">
                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                            </svg>
                        </span>
                        <input type="text" id="email" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5      dark:focus:ring-blue-500 " placeholder="Enter Email address">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="emailErr"></span>

                </div>
                <div class="py-2">
                    <label for="password" class="block mb-2 text-sm font-medium ">Password</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-primary border border-e-0  rounded-s-md ">
                            <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.804 9c1.038-1.793 2.977-3 5.196-3 3.311 0 6 2.689 6 6s-2.689 6-6 6c-2.219 0-4.158-1.207-5.196-3h-3.804l-1.506-1.503-1.494 1.503-1.48-1.503-1.52 1.503-3-3.032 2.53-2.968h10.274zm7.696 1.5c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5z" />
                            </svg>
                        </span>
                        <input type="password" id="password" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:focus:ring-blue-500 " placeholder="Enter password">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="passErr"></span>

                </div>
                <div class="py-2">
                    <label for="confirm-password" class="block mb-2 text-sm font-medium ">Confirm password</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-primary border border-e-0  rounded-s-md ">
                            <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.804 9c1.038-1.793 2.977-3 5.196-3 3.311 0 6 2.689 6 6s-2.689 6-6 6c-2.219 0-4.158-1.207-5.196-3h-3.804l-1.506-1.503-1.494 1.503-1.48-1.503-1.52 1.503-3-3.032 2.53-2.968h10.274zm7.696 1.5c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5z" />
                            </svg>
                        </span>
                        <input type="password" id="confirm-password" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:focus:ring-blue-500 " placeholder="Confirm password">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="confirmErr"></span>

                </div>
                <div class="text-center">
                    <button type="submit" name="addAdmin" class="bg-primary hover:bg-orange-600 text-white font-meduim py-2 px-12 mt-5 rounded-full">
                        Submit
                    </button>
                </div>
            </form>

        </div>
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

                <input type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-orange-300 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5  dark:text-gray-700  focus:border-orange-400 focus:border-orange-500 focus:ring-orange-500 focus:outline-none focus:ring focus:ring-opacity-40">
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
                            <tbody class="bg-white divide-y divide-orange-200 ">
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        dadasd585ssd8e
                                    </td>
                                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                        <div>
                                            <img src="<?php echo URLROOT ?>/assets/upload/vector.png" alt="" class="w-12 h-12">
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        AbdelouahedSn
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        abdosenane@gmail.com
                                    </td>

                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        24-12-2024
                                    </td>

                                    <td class="px-4 py-4 text-sm whitespace-nowrap text-center">
                                        <!-- Edit Button -->
                                        <!-- <button class="px-1 py-1 text-gray-800 bg-gray-100 transition-colors duration-200 rounded-lg  hover:bg-slate-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button> -->
                                        <!-- delete button -->
                                        <button class="px-1 py-1  bg-rose-600 transition-colors duration-200 rounded-lg  hover:bg-red-500">
                                            <svg class="w-6 h-6 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
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
<script type="module" src="<?php echo URLROOT ?>/js/admin/users.js"></script>
<?php include APPROOT . '/views/Includes/Admin/footer.php' ?>