<?php

    class User {
        private $ID_user;
        private $Username;
        private $Password;
        private $Email;
        private $Img_User;
        private $roleName;
        
        public function __construct()
        {
            
        }

        public function __get($proprety)
        {
            if (property_exists($this , $proprety)) {
                return $this->$proprety;
            }
        }

        public function __set($proprety, $value)
        {
            if (property_exists($this , $proprety)) {
                return $this->$proprety = $value;
            }
        }

    }


?>
