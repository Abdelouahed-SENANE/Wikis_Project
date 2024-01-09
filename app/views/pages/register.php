<?php require APPROOT . '/views/Includes/header.php'; ?>
<?php require APPROOT . '/views/Includes/navbar.php'; ?>


<div class="h-[calc(100vh-44px)] px-8 mt-10 lg:mt-0 lg:flex lg:items-center lg:justify-center lg:h-[calc(100vh-64px)]">
    <div class=" lg:w-[60%] h-[90%] lg:h-[80%] shadow-md  flex flex-col lg:flex-row overflow-hidden">

        <div class=" xl:w-[50%] lg:w-auto relative lg:h-full bg-orange-500  lg:pt-[50px] text-white p-5">
            <div class="lg:pt-[100px]">
                <h1 class="text-[35px] uppercase font-semibold text-center lg:pt-0 lg:text-start">Information</h1>
                <p class="py-5 text-center lg:text-start">
                        Certainly! Here's a concise 5-line paragraph for information registration:

                        Unlock a world of knowledge! Join our Wiki community by registering today. Provide your name, email, and a secure password to create your account effortlessly. Once registered, explore a multitude of features – from crafting your own wikis to discovering curated categories and tags.</p>
                <button class="block text-center w-full lg:my-6 lg:text-start">
                    <a href="<?= URLROOT ?>/pages/login" class="px-6 py-3 bg-white text-primary  rounded-full ">have an account?</a>
                </button>
            </div>
        </div>
        <div class="w-[100%] px-5 h-[70%] my-auto lg:w-[50%]">
            <div class="my-10 max-w-md mx-auto">
                <h2 class="uppercase text-[35px] text-orange-600 font-semibold">register form</h2>
            </div>
            <form class="max-w-md mx-auto" method="post" id="formRegister">
                <div>
                    <input type="hidden" name="csrf_token" value="<?php echo $data['token']?>">
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="username" id="fieldUsername" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                    <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                    <span class="text-rose-500 text-sm font-medium" id="userErr"></span>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                    <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                    <span class="text-rose-500 text-sm font-medium" id="emailErr"></span>

                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                    <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    <span class="text-rose-500 text-sm font-medium" id="passErr"></span>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-500 peer" placeholder=" "  />
                    <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                    <span class="text-rose-500 text-sm font-medium" id="confirmErr"></span>
                </div>
                <button type="submit" name="addAuteur" id="btnSubmit" class="text-white bg-orange-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-full px-8 text-sm w-full sm:w-auto px-5 py-2.5 text-center  dark:hover:bg-orange-500 dark:focus:ring-orange-600">Submit</button>
            </form>
        </div>


    </div>
</div>












<!-- load Script JS  -->
<script  type="module" src="<?php echo URLROOT?>/js/registration.js"></script>

<?php require APPROOT . '/views/Includes/footer.php'; ?>