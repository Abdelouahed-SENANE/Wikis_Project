
<?php 

    class Visitor extends Controller {
        private $userService;
        private $categoryService;
        private $tagService;
        private $wikiService;
        public function __construct()
        {   
            // Check if Role of User
            if (isLogged()) {
                if (isAdmin()) {
                    header('Location:' . URLROOT . '/admin/dashboard');
                    exit();
                }
            }
            
            $this->userService = new ServiceUser();
            $this->wikiService = new ServiceWiki();
            $this->categoryService = new ServiceCategory();
            $this->tagService = new serviceTags();
        }


        public function tags() {
            // if ($_SESSION['roleofuser'] == 'Auteur') {
            //     // header('Location:' . URLROOT . '/pages/login');
            // }
            $data = [
                'page' => 'tags'
            ];
            $this->view('visitor/tags' , $data);
        }
        public function findTags() {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $tags = $this->tagService->findTags($_GET['search']);
                if (isset($tags)) {
                    $response = [
                        'success' => true,
                        'tags' => $tags,
                    ];
                    // header('Content-type: application/json');
                    echo json_encode($response);
                    exit();
                }
                
            }

        }
        public function fetchAllTags() {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $tags = $this->tagService->fetchAllTags();
                // sent Response To Browser;
                $data = [
                    'success' => true,
                    'tags' => $tags,
                ];
                echo json_encode($data);
                exit;
            }

        }
        // ================ Fetch CATEGORY TO DATABASE ================
        public function fetchAllCategories() {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $categories = $this->categoryService->fetchAllCategories();
                // sent Response To Browser;
                $data = [
                    'success' => true,
                    'categories' => $categories,
                ];
                header('Content-type: application/json');

                echo json_encode($data);
                exit;
            }
        }
        public function categories() {

            $data = [
                'page' => 'categories'
            ];
            // if ($_SESSION['roleofuser'] == 'Auteur') {
            //     // header('Location:' . URLROOT . '/pages/login');
            // }
            $this->view('visitor/categories' , $data);
        }


        public function articles() {

        
            $tokenCSRF = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $tokenCSRF;
            $data = [
                'page' => 'articles',
                'token' => $tokenCSRF
            ];

            $this->view('visitor/articles' , $data);
        }
        public function addArticles() {
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $title = sanitizeInput($_POST['title']);
                $content = sanitizeInput($_POST['content']);
                $category_id = sanitizeInput($_POST['ID_category']);
                $user_id = sanitizeInput($_SESSION['ID_user']);
                $tags_id = $_POST['tags'];

                $errors = [];
                if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    $data = [
                        'success' => false,
                        'message' => 'Oops! It seems there was an issue with the form submission. Please try again.'
                    ];
                    echo json_encode($data);
                    exit;
                } else {
                    // var_dump($_FILES);
                    // Validate Images 
                    $allowed_extentions = [
                        'jpg',
                        'png',
                        'jpeg'
                    ];
                    $file_extention = pathinfo($_FILES['imgWiki']['name'], PATHINFO_EXTENSION);

                    if (!in_array(strtolower($file_extention) , $allowed_extentions)) {
                        $errors['imgErr'] = "Upload valid images. Only PNG and JPEG , JPG are allowed.";
                    }else if (($_FILES['imgWiki']['size'] > 2000000)) {
                        $errors['imgErr'] = "Image size exceeds 2MB";
                    }else {
                        $errors['imgErr'] = "";

                    }
                        
                    // if data is good Or not 
                    if (empty($errors['imgErr'])) {
                        $stock_img = $_SERVER["DOCUMENT_ROOT"]."/Wikis/public/assets/upload/";

                        $file_name = basename($_FILES['imgWiki']['name']);
                        $placement = $stock_img.$file_name;
                        
                        if (move_uploaded_file($_FILES['imgWiki']['tmp_name'] , $placement)) {

                            $newWiki = new Wiki();

                            $newWiki->id_wiki = uniqid();
                            $newWiki->wiki_title = $title;
                            $newWiki->wiki_content = $content;
                            $newWiki->wiki_img = $file_name;
                            $newWiki->id_category = $category_id;
                            $newWiki->id_user = $user_id;

                            $this->wikiService->addWiki($newWiki , $tags_id);
                            $wikis = $this->wikiService->fetchAllWikis();

                            if (isset($_SESSION['ID_user'])) {
                                $data = [
                                    'success' => true,
                                    'wikis' => $wikis,
                                    'user_session' => $_SESSION['ID_user']
                                ];
                                header('Content-type: application/json');
                
                                echo json_encode($data);
                                exit;
                            }else{
                                $data = [
                                    'success' => true,
                                    'wikis' => $wikis,
                                    'user_session' => ''
                                ];
                                header('Content-type: application/json');
                
                                echo json_encode($data);
                                exit;
                            }

                        }
                    
                        
                    } else {
                        $data = [
                            'success' => false,
                            'errors' => $errors
                        ];
                        echo json_encode($data);
                        exit;
                    }
                }
            
            }
        }

        // Get All Wikis ==============
        public function getAllArticles() {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $wikis = $this->wikiService->fetchAllWikis();
                // sent Response To Browser;

                if (isset($_SESSION['ID_user'])) {
                    $data = [
                        'success' => true,
                        'wikis' => $wikis,
                        'user_session' => $_SESSION['ID_user']
                    ];
                    header('Content-type: application/json');
    
                    echo json_encode($data);
                    exit;
                }else{
                    $data = [
                        'success' => true,
                        'wikis' => $wikis,
                        'user_session' => ''
                    ];
                    header('Content-type: application/json');
    
                    echo json_encode($data);
                    exit;
                }
               
            }

        }
        public function article() {
            
            $data = $this->wikiService->articlePage($_GET['wiki_id']);

            $this->view('visitor/article' , $data);
        }


        // Edit Article =============

        public function updateArticle() {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $title = sanitizeInput($_POST['title']);
                $id_wiki = sanitizeInput($_POST['wiki_id']);
                $content = sanitizeInput($_POST['content']);
                $category_id = sanitizeInput($_POST['ID_category']);
                $user_id = sanitizeInput($_SESSION['ID_user']);
                $tags_id = $_POST['tags'];

                $errors = [];
                if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    $data = [
                        'success' => false,
                        'message' => 'Oops! It seems there was an issue with the form submission. Please try again.'
                    ];
                    echo json_encode($data);
                    exit;
                } else {
                    // var_dump($_FILES);
                    // Validate Images 
                    $allowed_extentions = [
                        'jpg',
                        'png',
                        'jpeg'
                    ];
                    $file_extention = pathinfo($_FILES['imgWiki']['name'], PATHINFO_EXTENSION);

                    if (!in_array(strtolower($file_extention) , $allowed_extentions)) {
                        $errors['imgErr'] = "Upload valid images. Only PNG and JPEG , JPG are allowed.";
                    }else if (($_FILES['imgWiki']['size'] > 2000000)) {
                        $errors['imgErr'] = "Image size exceeds 2MB";
                    }else {
                        $errors['imgErr'] = "";

                    }
                        
                    // if data is good Or not 
                    if (empty($errors['imgErr'])) {
                        $stock_img = $_SERVER["DOCUMENT_ROOT"]."/Wikis/public/assets/upload/";

                        $file_name = basename($_FILES['imgWiki']['name']);
                        $placement = $stock_img.$file_name;
                        
                        if (move_uploaded_file($_FILES['imgWiki']['tmp_name'] , $placement)) {

                            $up_wiki = new Wiki();

                            $up_wiki->id_wiki = $id_wiki;
                            $up_wiki->wiki_title = $title;
                            $up_wiki->wiki_content = $content;
                            $up_wiki->wiki_img = $file_name;
                            $up_wiki->id_category = $category_id;
                            $up_wiki->id_user = $user_id;

                            $this->wikiService->updateArticle($up_wiki , $tags_id);
                            $wikis = $this->wikiService->fetchAllWikis();

                            if (isset($_SESSION['ID_user'])) {
                                $data = [
                                    'success' => true,
                                    'wikis' => $wikis,
                                    'user_session' => $_SESSION['ID_user']
                                ];
                                header('Content-type: application/json');
                
                                echo json_encode($data);
                                exit;
                            }else{
                                $data = [
                                    'success' => true,
                                    'wikis' => $wikis,
                                    'user_session' => ''
                                ];
                                header('Content-type: application/json');
                
                                echo json_encode($data);
                                exit;
                            }
                        }
                    
                        
                    } else {
                        $data = [
                            'success' => false,
                            'errors' => $errors
                        ];
                        echo json_encode($data);
                        exit;
                    }
                }
            
            }
        }
        public function deleteArticle() {
            $jsonInput = file_get_contents('php://input');
            $data = json_decode($jsonInput , true);

            if (isset($data['id'])) {
                $this->wikiService->deleteArticle($data['id']);
                $wikis = $this->wikiService->fetchAllWikis();

                if (isset($_SESSION['ID_user'])) {
                    $data = [
                        'success' => true,
                        'wikis' => $wikis,
                        'user_session' => $_SESSION['ID_user']
                    ];
                    header('Content-type: application/json');
    
                    echo json_encode($data);
                    exit;
                }else{
                    $data = [
                        'success' => true,
                        'wikis' => $wikis,
                        'user_session' => ''
                    ];
                    header('Content-type: application/json');
    
                    echo json_encode($data);
                    exit;
                }
            }
        }
        public function findCategory() {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $categories = $this->categoryService->findCategory($_GET['search']);
                if (isset($categories)) {
                    $response = [
                        'success' => true,
                        'categories' => $categories,
                    ];
                    // header('Content-type: application/json');
                    echo json_encode($response);
                    exit();
                }
                
            }

        }
        public function findWiki() {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $wikis = $this->wikiService->findWiki($_GET['search']);
                if (isset($wikis)) {
                    $response = [
                        'success' => true,
                        'wikis' => $wikis,
                    ];
                    // header('Content-type: application/json');
                    echo json_encode($response);
                    exit();
                }
                
            }

        }

    }
    


?>