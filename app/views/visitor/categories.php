<?php require APPROOT . '/views/Includes/Visitor/header.php'; ?>
<?php require APPROOT . '/views/Includes/Visitor/navbar.php'; ?>

<div class="container mx-auto px-10 my-5">
    <div class="flex relative flex-col gap-5 lg:flex-row lg:items-center">
        <aside class="w-full h-full  p-3 lg:w-[200px] shadow-lg rounded-lg">
            <div class="flex justify-center">
                <!-- ============= LOGO ================== -->
                <img src="<?= URLROOT ?>/assets/images/logo.png" alt="logo" class="w-24 h-24">
            </div>
            <ul class="my-10">
                <li class=" my-3 ml-2   rounded-md">
                    <a href="<?= URLROOT ?>/pages/index" class="flex p-2 gap-1.5 items-center hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="text-base">Home</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= URLROOT ?>/visitor/categories" class="<?php echo $data['page'] == 'categories' ?  'text-primary bg-slate-100' : '' ?> my-3 ml-2  rounded-md hover:text-primary hover:bg-slate-100  p-2 flex gap-1.5 items-center hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                        </svg>
                        <span class="text-base">Categories</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= URLROOT ?>/visitor/articles" class="<?php echo $data['page'] == 'articles' ?  'text-primary bg-slate-50' : '' ?> p-2 flex gap-1.5 items-center group  hover:text-primary my-3 ml-2  rounded-md  hover:bg-slate-100  p-2 flex gap-1.5 items-center hover:text-primary">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.362 2c4.156 0 2.638 6 2.638 6s6-1.65 6 2.457v11.543h-16v-20h7.362zm.827-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm4.811 13h-10v-1h10v1zm0 2h-10v1h10v-1zm0 3h-10v1h10v-1z" />
                        </svg>
                        <span class="text-base">Wikis</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= URLROOT ?>/visitor/tags" class="<?php echo $data['page'] == 'tags' ?  'text-primary bg-slate-50' : '' ?> p-2 flex gap-1.5 items-center   my-3 ml-2  rounded-md hover:text-primary hover:bg-slate-100  p-2 flex gap-1.5 items-center hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" height="48" width="48" class="h-6 w-6 group-hover:text-primary">
                            <g id="tag--codes-tags-tag-product-label">
                                <path id="Subtract" fill="currentColor" fill-rule="evenodd" d="M41.368 1.702c-6.806 -0.423 -13.042 -0.082 -15.884 0.129 -1.34 0.1 -2.616 0.582 -3.684 1.423 -3.035 2.392 -10.896 8.994 -18.831 19.018 -1.726 2.18 -1.976 5.215 -0.184 7.55 1.365 1.778 3.576 4.424 7.12 8.204 4.125 4.4 7.034 6.747 8.922 7.998 2.073 1.374 4.5 0.896 6.219 -0.404 10.545 -7.98 17.383 -16.341 19.77 -19.47a6.691 6.691 0 0 0 1.348 -3.574c0.21 -2.813 0.56 -9.09 0.133 -15.945a5.26 5.26 0 0 0 -4.93 -4.93ZM33.5 11a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1 -7 0Z" clip-rule="evenodd" stroke-width="1"></path>
                            </g>
                        </svg>
                        <span class="text-base">Tags</span>
                    </a>
                </li>

            </ul>
        </aside>
        <main class=" p-3 flex-grow shadow-lg rounded-lg h-full">
            <div class=" py-5">
                <h2 class="text-primary font-semibold uppercase text-2xl">Categories</h2>
                <p class="text-base max-w-[700px] my-5">
                    Categories are a method of organizing content or items into distinct groups based on common features, themes, or topics.
                </p>
            </div>

            <div class="flex flex-col gap-2 lg:flex-row lg:justify-between">
                <div class="relative flex items-center mt-4 md:mt-0">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-orange-600 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>

                    <input type="text" id="search_category" placeholder="Search" class="block w-full text-sm py-1.5 pr-5 text-gray-700 bg-white border border-orange-300 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5  dark:text-gray-700  focus:border-orange-400 focus:border-orange-500 focus:ring-orange-500 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>
                <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse ">
                    <button class="px-5 py-2 text-xs font-medium text-white transition-colors duration-200 bg-orange-500 sm:text-sm ">
                        View all
                    </button>

                    <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100">
                        Category
                    </button>
                </div>
            </div>
            <!-- ========== Container Tags -->
            <div id="categories-container" class="my-5 grid gap-5 grid-cols-1 lg:grid-cols-4">


            </div>
        </main>
    </div>
</div>





<script type="module" src="<?php echo URLROOT ?>/js/categories.js"></script>
<?php require APPROOT . '/views/Includes/Visitor/footer.php'; ?>