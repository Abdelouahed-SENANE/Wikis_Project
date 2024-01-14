<?php require APPROOT . '/views/Includes/Visitor/header.php'; ?>
<?php require APPROOT . '/views/Includes/Visitor/navbar.php'; ?>

<div id="overlayForm" class="bg-slate-800 hidden bg-opacity-60  w-full h-full z-[10] flex items-center justify-center backdrop-blur-sm absolute top-0 left-0">

    <!-- ============== Form to Admin -->
    <form class=" bg-white max-w-[600px] lg:w-[600px] rounded-xl p-5 relative" id="formWikis" enctype="multipart/form-data">
        <div class="absolute top-2 right-2 cursor-pointer">
            <svg id="close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 text-meduim">
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>

        </div>
        <div>
            <h2 class="text-2xl font-medium text-primary text-center">Form Wikis</h2>
        </div>
        <div>
            <input type="hidden" name="csrf_token" value="<?= $data['token'] ?>">
            <input type="hidden" name="wiki_id" id="id_wiki" value="">
        </div>
        <div class="py-2">
            <label for="desc" class="block mb-2 text-sm font-medium ">Title</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-primary border border-e-0  rounded-s-md ">
                    <svg clip-rule="evenodd" class="w-4 h-4 text-white" fill-rule="evenodd" stroke-linejoin="round" fill="currentColor" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m20.998 8.498h-17.996c-.569 0-1.001.464-1.001.999 0 .118-.105-.582 1.694 10.659.077.486.496.842.988.842h14.635c.492 0 .911-.356.988-.842 1.801-11.25 1.693-10.54 1.693-10.66 0-.558-.456-.998-1.001-.998zm-.964-3.017h-16.03c-.524 0-1.001.422-1.001 1.007 0 .081-.01.016.14 1.01h17.752c.152-1.012.139-.931.139-1.009 0-.58-.469-1.008-1-1.008zm-15.973-1h15.916c.058-.436.055-.426.055-.482 0-.671-.575-1.001-1.001-1.001h-14.024c-.536 0-1.001.433-1.001 1 0 .056-.004.043.055.483z" fill-rule="nonzero" />
                    </svg>
                </span>
                <input type="text" id="titleWiki" name="title" class="rounded-none rounded-e-lg bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5      dark:focus:ring-blue-500 " placeholder="Enter title wiki">
            </div>
            <span class="text-rose-500 text-sm font-medium" id="titleErr"></span>
        </div>
        <div class="py-2">
            <label for="email" class="block mb-2 text-sm font-medium ">Content</label>
            <div class="flex">

                <textarea id="contentWiki" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:placeholder-gray-400 resize-none" placeholder="Write your thoughts here..."></textarea>

            </div>
            <span class="text-rose-500 text-sm font-medium" id="contentErr"></span>
        </div>
        <div class="py-2">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Image</label>
            <input class="block file:py-1.5 file:px-3 file:text-white file:border-none file:bg-primary w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" name="imgWiki" id="imgWiki" type="file">
            <span class="text-rose-500 text-sm font-medium" id="imgErr"></span>
        </div>
        <div class="py-3">
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 ">Select Category</label>
            <select id="categories" name="ID_category" class="border-gray-200 bg-white border text-gray-900 text-sm font-medium rounded-lg  block w-full p-2  focus:border-primary">

            </select>
            <span class="text-rose-500 text-sm font-medium" id="catErr"></span>
        </div>



        <div class="py-3 relative ">
            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 ">Select tags</label>
            <!-- <div>
                <input type="text" id="search_tags" class="rounded-none  bg-gray-50 border  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5      " placeholder="Search tags">
            </div> -->
            <select multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" multiselect-hide-x="false" id="sel1" name="tags[]">
            </select>

            <span class="text-rose-500 text-sm font-medium" id="tagErr"></span>
        </div>
        <div class="text-center">
            <button type="submit" id="submit" name="addCategory" class="bg-primary hover:bg-orange-600 text-white font-meduim py-2 px-12 mt-5 rounded-full">

            </button>
        </div>
    </form>

</div>
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
        <main class=" p-3  flex-grow shadow-lg rounded-lg h-full">
            <div class="">
                <div class=" py-5">
                    <h2 class="text-primary font-semibold uppercase text-2xl">Wikis</h2>
                    <p class="text-base max-w-[700px] my-5">
                        Embark on a captivating journey as we delve into the fascinating world of [topic]. Our latest article, "Exploring [Topic]," invites readers to discover a rich tapestry of insights and information. </p>
                </div>
            </div>
            <!-- ============= Formulaires ============= -->

            <div class="mr-5 absolute top-0 right-0">
                <?php if (isset($_SESSION['ID_user'])) : ?>
                    <a href="#" id="addBtn" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-orange-600 focus:ring-2 focus:outline-none focus:ring-orange-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Add Wiki
                    </a>
                <?php else :  ?>
                    <a href="<?php echo URLROOT ?>/pages/login" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-orange-600 focus:ring-2 focus:outline-none focus:ring-orange-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Add Wiki
                    </a>
                <?php endif ?>
            </div>
            <div class="flex flex-col gap-2 lg:flex-row lg:justify-between">
                <div class="relative flex items-center mt-4 md:mt-0">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-orange-600 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>

                    <input type="text" id="search_wikis" placeholder="Search" class="block w-full text-sm py-1.5 pr-5 text-gray-700 bg-white border border-orange-300 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5  dark:text-gray-700  focus:border-orange-400 focus:border-orange-500 focus:ring-orange-500 focus:outline-none focus:ring focus:ring-opacity-40">
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
            <div id="articles-container" class="my-5 grid gap-5 grid-cols-1 lg:grid-cols-4">

                <!-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm  dark:border-slate-200">
                    <a href="#">
                        <img class="rounded-t-lg" src="http://localhost/wikis/assets/upload/${category.Img_category}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 ">${category.Category_Name}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 ">${category.Category_Desc}</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-orange-600 focus:ring-2 focus:outline-none focus:ring-orange-300 ">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div> -->

            </div>

        </main>

    </div>
</div>





<script type="module" defer src="<?php echo URLROOT ?>/js/multiselect-dropdown.js"></script>
<script type="module" defer src="<?php echo URLROOT ?>/js/articles.js"></script>

<?php require APPROOT . '/views/Includes/Visitor/footer.php'; ?>