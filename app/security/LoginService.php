<?php
    
    class LoginService implements LoginInterface {

        private $db;
        public function __construct()
        {
            $this->db = Database::getInstance();
        }

        public function getUserByEmail($email)
        {
            $sql = "SELECT * FROM user WHERE email = :email";

            try {
                $this->db->query($sql);
                $this->db->bind(":email" , $email);
                $user = $this->db->oneObject();
                return $user;
            } catch (PDOException $e) {
                echo "Error Database" . $e->getMessage();
            }
        }
        public function getRoleOfUserById($id) {

            $sql = "SELECT roleName FROM roleofuser WHERE ID_user = :id";
            try {
                $this->db->query($sql);
                $this->db->bind(":id" , $id);
                $roleOfUser = $this->db->oneObject();
                return $roleOfUser;
            } catch (PDOException $e) {
                echo "Error Database" . $e->getMessage();
            }
        }


    }
?>