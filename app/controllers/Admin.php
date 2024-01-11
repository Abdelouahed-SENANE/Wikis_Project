<?php
include APPROOT . '/helpers/helpers.php';

    class Admin extends Controller {
        private $userService;
        private $categoryService;
        public function __construct()
        {
            $this->userService = new ServiceUser();
            $this->categoryService = new ServiceCategory();
        }

        public function dashboard() {

            $data = [
                'page' => 'dashboard',
            ];
            $this->view('admin/dashboard' , $data);
        }

//================= USERS ACTIONS ============== 
        // Pages Users
        public function users() {
            $tokenCSRF = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $tokenCSRF;
            $data = [
                'page' => 'users',
                'token' => $tokenCSRF
            ];

            $this->view('admin/users' , $data);
        }

        public function addAdmin() {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $username = sanitizeInput($_POST['username']);
                $email = sanitizeInput($_POST['email']);
                $password = sanitizeInput($_POST['password']);
                $errors = [];
                if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    $data = [
                        'success' => false,
                        'message' => 'Oops! It seems there was an issue with the form submission. Please try again.'
                    ];
                    echo json_encode($data);
                    exit;
                } else {
                    // ======== Validate Username
                    if (empty($username)) {
                        $errors['username'] = "Please Enter username";
                    } else {
                        $regexUsername = '/^[a-zA-Z0-9_.-]{3,20}$/';
                        if (!preg_match($regexUsername, $username)) {
                            $errors['username'] = "Please Valid username";
                        } else {
                            $errors['username'] = "";
                        }
                    }
                    // Validation Password 
                    if (empty($password)) {
                        $errors['password'] = "Please Enter password";
                    } else {
                        $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
                        if (!preg_match($regexPassword, $password)) {
                            $errors['password'] = "Please Valid password";
                        } else {
                            $errors['password'] = "";
                        }
                    }
                    // Validation Email 
                    if (empty($email)) {
                        $errors['email'] = "Please Enter email";
                    } else {
                        $regexemail = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
                        if (!preg_match($regexemail, $email)) {
                            $errors['email'] = "Please Valid email";
                        } else {
                            $errors['email'] = "";
                        }
                    }
    
    
                    // if data is good Or not 
                    if (empty($errors['username']) && empty($errors['email']) && empty($errors['password'])) {
    
                        $password = password_hash($password , PASSWORD_DEFAULT);
    
                        $newUser = new User();
                        $newUser->ID_user = uniqid();
                        $newUser->Username = $username;
                        $newUser->Password = $password;
                        $newUser->Email = $email;
                        $newUser->Img_User = 'vector.png';
                        $newUser->roleName = 'Admin';
                        
                        $this->userService->addUser($newUser);
                        $users = $this->userService->fetchUsers();
                        $data = [
                            'success' => true,
                            'users' => $users,
                            'message' => 'Registration Sucessfully'
                        ];
                        echo json_encode($data);
                        exit;
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

        // function fetch Users 
        public function fetchAllUsers() {
            $users = $this->userService->fetchUsers();
            $data = [
                'users' => $users,
            ];
            echo json_encode($data);
            exit;
        }
        // Delete Users From DataBase 
        public function deleteUsers() {

           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $jsonInput = file_get_contents('php://input');
                $data = json_decode($jsonInput , true);

                if (isset($data['id'])) {
                    $id_delete = $data['id'];

                    $this->userService->deleteUsers($id_delete);
                    $users = $this->userService->fetchUsers();

                    $response = [
                        'success' => true,
                        'users' => $users,
                        'message' => 'User Deleted Succefully'
                    ];
                    header('Content-type: application/json');
                    echo json_encode($response);
                }

           }

            
        }
        // ============ Search Users ===========
        public function searchUsers() {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $users = $this->userService->findUsers($_GET['search']);
                if (isset($users)) {
                    $response = [
                        'success' => true,
                        'users' => $users,
                    ];
                    // header('Content-type: application/json');
                    echo json_encode($response);
                    exit();
                }
                
            }
            
        }
// ==================================================================




        public function wikis() {

            $data = [
                'page' => 'wikis',
            ];
            $this->view('admin/wikis' , $data);
        }
//========================= Actions CATEGORIES =============================
        public function categories() {

            $tokenCSRF = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $tokenCSRF;
            $data = [
                'page' => 'categories',
                'token' => $tokenCSRF
            ];
            $this->view('admin/categories' , $data);
        }
        // ================ ADD CATEGORY TO DATABASE ================
        public function addCategories() {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $categoryName = sanitizeInput($_POST['name']);
                    $categoryDesc = sanitizeInput($_POST['desc']);

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
                    $file_extention = pathinfo($_FILES['imageCategory']['name'], PATHINFO_EXTENSION);
  
                    if (!in_array(strtolower($file_extention) , $allowed_extentions)) {
                        $errors['imgErr'] = "Upload valid images. Only PNG and JPEG , JPG are allowed.";
                    }else if (($_FILES['imageCategory']['size'] > 2000000)) {
                        $errors['imgErr'] = "Image size exceeds 2MB";
                    }else {
                        $errors['imgErr'] = "";

                    }
                        
                    // if data is good Or not 
                    if (empty($errors['imgErr'])) {
                        $stock_img = $_SERVER["DOCUMENT_ROOT"]."/Wikis/public/assets/upload/";

                        $file_name = basename($_FILES['imageCategory']['name']);
                        $placement = $stock_img.$file_name;
                        
                        if (move_uploaded_file($_FILES['imageCategory']['tmp_name'] , $placement)) {
                            $newCategory = new Category();
                            $newCategory->ID_category = uniqid();
                            $newCategory->Category_Name = $categoryName;
                            $newCategory->Category_Desc = $categoryDesc;
                            $newCategory->Img_Category = $file_name;

                            $this->categoryService->addCategory($newCategory);
                            $categories = $this->categoryService->fetchAllCategories();
                            // sent Response To Browser;
                            $data = [
                                'success' => true,
                                'categories' => $categories,
                                'message' => 'Category Add succefully'
                            ];
                            echo json_encode($data);
                            exit;

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
        // ================ Fetch CATEGORY TO DATABASE ================
        public function fetchAllCategories() {

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $categories = $this->categoryService->fetchAllCategories();
                // sent Response To Browser;
                $data = [
                    'success' => true,
                    'categories' => $categories,
                ];
                echo json_encode($data);
                exit;
            }
        }
        // ================ Delete CATEGORY FROM DATABASE ============
        public function deleteCategory(){
            $jsonInput = file_get_contents('php://input');
            $data = json_decode($jsonInput , true);
            if (isset($data['id'])) {
                
                $this->categoryService->deleteCategory($data['id']);
                $categories = $this->categoryService->fetchAllCategories();
                // sent Response To Browser;
                $data = [
                    'success' => true,
                    'message' => 'Category Deleted Succefully',
                    'categories' => $categories,
                ];
                echo json_encode($data);
                exit;


            }

        }
        // ============ Search Categories ===========
            public function searchCategory() {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    
                    $categories = $this->categoryService->findCategories($_GET['search']);
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




//============================================================================
        public function tags() {

            $data = [
                'page' => 'tags',
            ];
            $this->view('admin/tags' , $data);
        }
    }


?>