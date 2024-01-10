
<!--  ======== side bar ========= -->
<aside class="bg-primary h-[100vh] w-[70px] transition-[width] duration-200 ease-in-out flex-shrink transition text-white" id="sidebar">
    <!-- ============ Toggle Button ============ -->
    <div class="flex justify-between flex-col h-full">
        <div class="">
            <div class=" px-2 space-y-1 mt-5" id="logo">

                <div class="text-lg text-black rounded-lg mt-10 bg-white ">
                    <a href="" class="link text-secondary group flex items-center justify-center px-2 py-2  text-lg leading-6 font-medium rounded-md">
                        <!-- Heroicon name: outline/home -->

                        <img src="<?= URLROOT ?>/assets/images/Logo.png" alt="" class="flex-shrink-0 h-10 w-10 text-secondary">
                        <!-- <span class="text-2xl font-semibold title" >Wi-Blog</span> -->
                    </a>


                </div>

            </div>
            <div class="px-2 space-y-1 mt-10 ">
                <!-- Current: "bg-cyan-800 text-secondary", Default: "text-cyan-100 hover:text-secondary hover:bg-cyan-600" -->
                <a href="<?php echo URLROOT ?>/admin/dashboard" class="link hover:text-primary hover:bg-white  hover:transition hover:delay-100 group  flex items-center justify-center  px-2 py-2  text-lg leading-6 font-medium rounded-md">
                    <!-- Heroicon name: outline/home -->
                    <svg class=" flex-shrink-0 h-7 w-7 icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1v14h16M4 5l3 4 4-4 5 5m0 0h-3.207M16 10V6.793" />
                    </svg>
                    <!-- <div class="title">Dashboard</div> -->
                </a>
                <a href="<?php echo URLROOT ?>" class="link hover:text-primary hover:bg-white  hover:transition hover:delay-100 group flex items-center justify-center px-2 py-2  text-lg leading-6 font-medium rounded-md">
                    <!-- Heroicon name: outline/home -->
                    <svg class="flex-shrink-0 h-7 w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <!-- <div class="title">Users</div> -->
                </a>


                <a href="<?php echo URLROOT ?>" class="link text-secondary hover:text-primary hover:bg-white  hover:transition hover:delay-100 group flex items-center justify-center px-2 py-2 text-lg leading-6 font-medium rounded-md">
                    <!-- Heroicon name: outline/scale -->
                    <svg class="flex-shrink-0 h-7 w-7 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 19">
                        <path d="M1 19h13a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H0v10a1 1 0 0 0 1 1ZM0 6h7.443l-1.2-1.6a1 1 0 0 0-.8-.4H1a1 1 0 0 0-1 1v1Z" />
                        <path d="M17 4h-4.557l-2.4-3.2a2.009 2.009 0 0 0-1.6-.8H4a2 2 0 0 0-2 2h3.443a3.014 3.014 0 0 1 2.4 1.2l2.1 2.8H14a3 3 0 0 1 3 3v8a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z" />
                    </svg>
                    <!-- <div class="title">Categories</div> -->
                </a>

                <a href="<?php echo URLROOT ?>" class="link text-secondary hover:text-primary hover:bg-white  hover:transition hover:delay-100 group flex items-center justify-center px-2 py-2 text-lg leading-6 font-medium rounded-md">
                    <!-- Heroicon name: outline/credit-card -->
                    <svg class="7flex-shrink-0 h-7 w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                        <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                        <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                    </svg>
                    <!-- <div class="title">Wikis</div> -->
                </a>

                <a href="<?php echo URLROOT ?>" class="link text-secondary hover:text-primary hover:bg-white  hover:transition hover:delay-100 group flex items-center justify-center px-2 py-2 text-lg leading-6 font-medium rounded-md">
                    <!-- Heroicon name: outline/user-group -->
                    <svg class=" flex-shrink-0 h-7 w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                    </svg>
                    <!-- <div class="title">Tags</div> -->
                </a>


            </div>
        </div>
        <div class="px-2 space-y-1 mb-10 ">
            <a href="<?php echo URLROOT ?>/admin/home" class="link hover:text-primary hover:bg-white  hover:transition hover:delay-100 group  flex items-center justify-center px-2 py-2 text-lg leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/home -->
                <svg class=" flex-shrink-0 h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 14" height="14" width="14">
                        <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h7A1.5 1.5 0 0 1 10 1.5v1.939a2 2 0 0 0 -0.734 1.311H5.75a2.25 2.25 0 1 0 0 4.5h3.516A2 2 0 0 0 10 10.561V12.5A1.5 1.5 0 0 1 8.5 14h-7A1.5 1.5 0 0 1 0 12.5v-11Zm10.963 2.807A0.75 0.75 0 0 0 10.5 5v1H5.75a1 1 0 0 0 0 2h4.75v1a0.75 0.75 0 0 0 1.28 0.53l2 -2a0.75 0.75 0 0 0 0 -1.06l-2 -2a0.75 0.75 0 0 0 -0.817 -0.163Z"></path>
                </svg>
                <!-- <div class="title">Logout</div> -->
            </a>
        </div>
    </div>


</aside>