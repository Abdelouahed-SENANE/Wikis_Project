<?php

    class ServiceCategory implements InterfaceCategory {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }
        public function addCategory(Category $newCategory)
        {
            $sql = "INSERT INTO categories VALUES (:id , :name , :desc , :img)";

            try {
                $this->db->query($sql);
                $this->db->bind(':id' , $newCategory->ID_category);
                $this->db->bind(':name' , $newCategory->Category_Name);
                $this->db->bind(':desc' , $newCategory->Category_Desc);
                $this->db->bind(':img' , $newCategory->Img_Category);
                $this->db->execute();


            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }




        }



    }

?>