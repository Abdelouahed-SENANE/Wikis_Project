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
        // Fetch Users From Database 
        public function fetchUsers() {
            $sql = "SELECT * FROM user";
            try {
                $this->db->query($sql);
                $users = $this->db->manyObjects();
                return $users;
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }
        }
        // ===== Delete Users From Database 
        public function deleteUsers($id) {

            $sql = "DELETE FROM user WHERE ID_user = :id";

            try {
                $this->db->query($sql);
                $this->db->bind(":id" , $id);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }



        }

        // =========== Search Users ========
        public function findUsers($value) {

            $sql = "SELECT * FROM user WHERE Username LIKE :value OR Email LIKE :value";
            try {
                $this->db->query($sql);
                $this->db->bind(":value" , $value . '%');
                $users = $this->db->manyObjects();
                return $users;
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }



        }

    }

?>