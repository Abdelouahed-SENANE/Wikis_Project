<?php require APPROOT . '/views/Includes/Visitor/header.php'; ?>
<?php require APPROOT . '/views/Includes/Visitor/navbar.php'; ?>

<!-- == landing page == -->
<div class="w-full relative h-[calc(100vh-44px)] bg-[url(../assets/images/background.jpg)] bg-cover overflow-hidden bg-center bg-no-repeat lg:h-[calc(100vh-64px)] ">
    <!-- == overlay === -->
    <div class="w-full h-full bg-black opacity-80 absolute top-0 left-0 "></div>
    <div class="container relative h-full mx-auto px-10 z-[20px] flex items-center justify-center">
        <div class="pt-10 text-center  max-w-[750px]">
            <h1 class="text-[25px] text-white font-semibold  mt-5 mb-5 lg:text-[35px] ">Collaborative Wi-Blog Platform for Seamless Content Creation and Discovery</h1>
            <p class="text-center text-gray-300">Welcome to Knowledge Hub, your go-to destination for collaborative knowledge creation and exploration. Embrace a space where individuals come together to contribute, share, and discover a wealth of information.</p>
            <button class="flex items-center justify-center w-full my-5 ">
                <a href="#" class="bg-primary px-10 py-3 rounded-full hover:bg-transparent hover: hover:border hover:border-primary transition duration-300 hover:text-primary">Read More</a>
            </button>
        </div>
    </div>
</div>
<!-- == End landing page == -->



















<?php require APPROOT . '/views/Includes/Visitor/footer.php'; ?>