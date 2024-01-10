<?php require APPROOT . '/views/Includes/Visitor/header.php'; ?>
<?php require APPROOT . '/views/Includes/Visitor/navbar.php'; ?>


<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="h-[100vh]  flex bg-gradient-to-r from-[#FDB777] to-[#FD7F2C]  items-center justify-center ">
    <div class="flex  flex-col lg:w-[500px] justify-center px-6 py-12 bg-white rounded-lg lg:px-8">
        <p class="text-green-600 bg-green-200 opcaity-40 px-5 py-2 rounded-md my-3 hidden" id="messageSucces"></p>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="flex justify-center">
                <img src="<?= URLROOT ?>/assets/images/logo.png" alt="logo" class="w-10 h-10">
            </div>
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST" id="loginForm">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text"  placeholder="Enter Email"  class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 outline-none ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="EmailErr"></span>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" placeholder="Enter password"   class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 outline-none ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                    </div>
                    <span class="text-rose-500 text-sm font-medium" id="passErr"></span>

                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#FDB777] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>
            <p class="text-red-600 bg-red-200 opcaity-40 px-2  rounded-md" id="UserErr">
            </p>
            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="<?= URLROOT ?>/pages/register" class="font-semibold leading-6 text-primary hover:text-[#FDB777]">do not Have an account ?</a>
            </p>
        </div>
    </div>
</div>




<script type="module" src="<?php echo URLROOT ?>/js/login.js"></script>
<?php require APPROOT . '/views/Includes/Visitor/footer.php'; ?>
