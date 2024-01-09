<?php
include APPROOT . '/helpers/helpers.php';

class Pages extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {




        $this->view('pages/index');
    }

    public function login()
    {



        $this->view('pages/login');
    }
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
}
