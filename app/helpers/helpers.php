<?php

        function sanitizeInput($input) {
            // Trim leading and trailing whitespaces
            $input = trim($input);
        
            // Remove HTML and PHP tags
            $input = filter_var($input, FILTER_SANITIZE_STRING);
        
            // Convert special characters to HTML entities
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
            return $input;
        }
        // function checkRoleOfUser($roleOfUser) {
        //     switch ($roleOfUser) {
        //         case 'Admin':
        //             header('Location:' . URLROOT . '/admin/dashboard');
        //             exit();
        //         case 'Auteur':
        //             header('Location:' . URLROOT . '/visitor/articles');
        //             exit();
        //         default:
        //             header('Location:' . URLROOT . '/pages/login');
        //             exit();
        //     }
        // }
        function isLogged() {
            if(isset($_SESSION['roleofuser'])){
                return true;
            }else{
                return false;
            }
        }
        function isAdmin() {
            if($_SESSION['roleofuser'] === 'Admin'){
                return true;
            }else{
                return false;
            }
        }

?>