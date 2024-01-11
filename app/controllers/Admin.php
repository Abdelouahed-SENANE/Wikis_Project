<?php
include APPROOT . '/helpers/helpers.php';

    class Admin extends Controller {
        private $userService;
        public function __construct()
        {
            $this->userService = new ServiceUser();
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

        public function addCategories() {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
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