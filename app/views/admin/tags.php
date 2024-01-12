<?php include APPROOT . '/views/Includes/Admin/header.php' ?>

<?php include APPROOT . '/views/Includes/Admin/sidebar.php' ?>

<main class="flex-1 w-full bg-slate-100">
    <!-- Nav bar ========== -->
    <?php include APPROOT . '/views/Includes/Admin/navbar.php' ?>

    <!-- component -->
    <section class="  p-5 mx-5 my-5 rounded-lg shadow-lg shadow-slate-200/50 bg-white">
        <!-- Add form ======================== -->
        <div id="overlayForm" class="bg-slate-800 bg-opacity-60 hidden w-full h-full z-[10] flex items-center justify-center backdrop-blur-sm absolute top-0 left-0">

            <!-- ============== Form to Admin -->
            <form class=" bg-white w-[600px] rounded-xl p-5 relative" id="formTag">
                <div class="absolute top-2 right-2 cursor-pointer" id="closeBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 text-meduim">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>

                </div>
                <div>
                    <h2 class="text-2xl font-medium text-primary text-center">Form Tags</h2>
                </div>
                <div>
                    <input type="hidden" name="csrf_token" value="<?= $data['token'] ?>">
                    <input type="hidden" name="tag_id" id="id_tag" value="">

                </div>
                <div class="py-2">
                    <label for="desc" class="block mb-2 text-sm font-medium ">Tag name</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-primary border border-e-0  rounded-s-md ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-5 w-5"  fill="currentColor" width="24" height="24" viewBox="0 0 24 24"><path d="M13.219 4h-3.926c-1.654-2.58-4.919-4.182-8.293-3.983v1.688c2.286-.164 4.79.677 6.113 2.295h-2.113v2.339c-2.059-.157-4.005.605-5 1.159l.688 1.617c1.196-.625 2.53-1.243 4.312-1.026v4.084l10.796 10.827 8.204-8.223-10.781-10.777zm-2.226 5.875c-.962.963-2.598.465-2.88-.85 1.318.139 2.192-.872 2.114-2.017 1.261.338 1.701 1.93.766 2.867z"/></svg>
                        </span>
                        <input type="text" id="tagName" name="name" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:focus:ring-blue-500 " placeholder="Enter tag name">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="nameErr"></span>
                </div>

                <div class="text-center">
                    <button type="submit"  name="addTags" class="bg-primary hover:bg-orange-600 text-white font-meduim py-2 px-12 mt-5 rounded-full">
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
                    <h2 class="text-2xl uppercase font-medium text-gray-800 t">Tags</h2>
                </div>

            </div>

            <div class="flex items-center mt-4 gap-x-3">

                <button id="openAddTags"  class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-primary rounded-md shrink-0 sm:w-auto gap-x-2 hover:bg-orange-400  ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Add Tag</span>
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

                <input type="text" id="search_categories" placeholder="Search by name" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-orange-300 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5  dark:text-gray-700  focus:border-orange-400 focus:border-orange-500 focus:ring-orange-500 focus:outline-none focus:ring focus:ring-opacity-40">
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
                                        <span>ID_tag</span>
                                    </th>

                                    <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                        Tag name
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                        Create at
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">update at</th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-orange-200 " id="tags-container">
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
<script type="module" src="<?php echo URLROOT ?>/js/admin/tags.js"></script>
<?php include APPROOT . '/views/Includes/Admin/footer.php' ?>
