<?php

    class ServiceUser implements InterfaceUser {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }

        public function addUser(User $newUser)
        {
            $sql_1 = "INSERT INTO user VALUES(:id , :username , :password , :email , :img , NOW())";
            try {
                $this->db->query($sql_1);
                $this->db->bind(":id" , $newUser->ID_user);
                $this->db->bind(":username" , $newUser->Username);
                $this->db->bind(":password" , $newUser->Password);
                $this->db->bind(":email" , $newUser->Email);
                $this->db->bind(":img" , $newUser->Img_User);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }

            $sql_2 = "INSERT INTO roleofuser VALUES(:ID_user , :roleName)";
            try {
                $this->db->query($sql_2);
                $this->db->bind(":ID_user" , $newUser->ID_user);
                $this->db->bind(":roleName" , $newUser->roleName);

                $this->db->execute();
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }
        }
    }

?>