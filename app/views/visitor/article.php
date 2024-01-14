<?php require APPROOT . '/views/Includes/Visitor/header.php'; ?>
<?php require APPROOT . '/views/Includes/Visitor/navbar.php'; ?>

<div class="h-[400px] flex items-center justify-center bg-[url(../assets/images/blog.jpg)] bg-cover bg-center relative">
    <div class="h-full w-full bg-black bg-opacity-60 absolute left-0"></div>
    <div class="relative text-center">
        <span class="text-primary font-semibold  tracking-widest">READ THE DETAILS</span>
        <h1 class="text-[50px] text-white font-bold">Single Article</h1>
    </div>
</div>

<div class="my-[100px]">
    <div class="container mx-auto lg:w-[65%]">
        <div class=" lg:flex ">
            <div class="flex-grow lg:px-5 py-2 mx-3">
                <div>
                    <img src="<?php echo URLROOT ?>/assets/upload/<?php echo  $data['article']->Wiki_img?>" alt="" class="w-full  rounded-lg">
                </div>
                <div class="my-5 flex items-center gap-2">
                    <div class="flex items-center gap-2">
                        <span>
                            <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z" />
                            </svg>
                        </span>
                        <?php if (isset($_SESSION['roleofuser'])) : ?>
                            <span class="text-sm"><?php echo $_SESSION['roleofuser'] ?></span>
                        <?php else : ?>
                            <span class="text-sm">Guest</span>

                        <?php endif ?>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                        </svg>
                        <span>
                            <?=  $data['article']->Created_at?>
                        </span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl lg:text-[40px] my-5 font-semibold "><?= $data['article']->Wiki_title ?></h1>
                    <p class="text-sm  text-gray-600 lg:text-base"><?= $data['article']->Wiki_content ?></p>
                </div>
            </div>
            <div class=" min-w-[250px] my-10 lg:my-0 lg:px-5 mx-3 py-2">
                <div>
                    <h2 class="text-2xl font-semibold">Recent Post</h2>
                </div>
                <div>
                    <ul>
                        <?php foreach($data['latest_article'] as $title) : ?>
                        <li><a href="#" class="text-gray-600 hover:text-primary"><?= $title->Wiki_title ?></a></li>
                        <?php endforeach ?>

                    </ul>
                </div>

                <div class="my-5">
                    <h2 class="text-2xl font-semibold">Tags</h2>
                    <ul class="my-2 grid grid-cols-1 items-center gap-1">
                    <?php foreach($data['tags'] as $tag) : ?>

                        <li class="text-sm font-medium bg-gray-300 px-6 rounded-lg py-1.5 ">
                            <?= $tag->Tag_name ?>
                        </li>
                    <?php endforeach ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" defer src="<?php echo URLROOT ?>/js/article.js"></script>

<?php require APPROOT . '/views/Includes/Visitor/footer.php'; ?>