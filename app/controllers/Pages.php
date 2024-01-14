<?php

class Pages extends Controller
{
    private $userService;
    private $loginService;
    public function __construct()
    {
        $this->userService = new ServiceUser();
        $this->loginService = new LoginService();
    }
    public function index()
    {




        $this->view('pages/index');
    }

    public function login()
    {
        if (isLogged()) {
            header('Location:' . URLROOT . '/visitor/articles');
        }


        $this->view('pages/login');
    }
    // Verification Users 
    public function verifyLogin() {
        ob_start();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
            $password = sanitizeInput($_POST['password']);;

            $user = $this->loginService->getUserByEmail($email);

            if (!empty($user)) {

                if (password_verify($password , $user->Password)) {

                    $roleOfUser = $this->loginService->getRoleOfUserById($user->ID_user);
                    $_SESSION['ID_user'] = $user->ID_user;
                    $_SESSION['username'] = $user->Username;
                    $_SESSION['password'] = $user->Password;
                    $_SESSION['email'] = $user->Email;
                    $_SESSION['img_User'] = $user->Img_User;
                    $_SESSION['roleofuser'] = $roleOfUser->roleName;

                    $data = ['status' => 'Success' , 'message' => 'Login Succefully'];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                   
                }else{
                    $data = ['status' => 'errorPass' , 'message' => 'Invalid Password'];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                }    
            
            }else{
                $data = ['status' => 'errorUser' , 'message' => 'Username or password incorrect'];
                header('Content-Type: application/json');
                echo json_encode($data);
            }
            
        }
        ob_end_flush();
    }

    // register Page 
    public function register()
    {

        // // CSRF Token ======
        $tokenCSRF = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $tokenCSRF;
        $data = [
            'token' => $tokenCSRF
        ];

        // }else{
        //     $data = [
        //         'userErr' => ''
        //     ];
        // }



        $this->view('pages/register', $data);
    }
    // Add new User Auteur 
    public function addAuteur()
    {

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
                    $newUser->roleName = 'Auteur';
                    
                    $this->userService->addUser($newUser);
                    


                    $data = [
                        'success' => true,
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




    public function about()
    {
        $data = [
            'title' => 'About us'
        ];
        $this->view('pages/about', $data);
    }

    public function logout() {

        // var_dump($_SESSION);
        foreach($_SESSION as $key=>$value) {
                // var_dump($_SESSION[$key]);
            if ($key !== 'csrf_token') {
                unset($_SESSION[$key]);
            }
        }
        session_destroy();
        header('Location:' . URLROOT . '/pages/login');
    }
}
?>