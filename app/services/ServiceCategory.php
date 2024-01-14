<?php

    class ServiceCategory implements InterfaceCategory {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }
        public function addCategory(Category $newCategory)
        {
            $sql = "INSERT INTO categories VALUES (:id , :name , :desc , :img , NOW() , NULL)";

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

        public function fetchAllCategories()
        {
            $sql = "SELECT * FROM categories";

            try {
                $this->db->query($sql);
                $categories = $this->db->manyObjects();
                return $categories;
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }
        }
        // ================ DELETE CATEGORY ===================
        public function deleteCategory($id_category)
        {
            $sql = "DELETE FROM categories WHERE ID_category = :id";
            try {
                $this->db->query($sql);
                $this->db->bind(":id" , $id_category);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }
        }
        public function findCategories($value) {

            $sql = "SELECT * FROM categories WHERE Category_name LIKE :value LIMIT 7";
            try {
                $this->db->query($sql);
                $this->db->bind(":value" , $value . '%');
                $categories = $this->db->manyObjects();
                return $categories;
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }



        }
        public function updateCategory(Category $updateCategory) {
            $sql = "UPDATE categories SET Category_Name= :name,Category_Desc= :desc, Img_category= :img, Updated_at= NOW() WHERE  ID_category = :id";

            try {
                $this->db->query($sql);
                $this->db->bind(':id' , $updateCategory->ID_category);
                $this->db->bind(':name' , $updateCategory->Category_Name);
                $this->db->bind(':desc' , $updateCategory->Category_Desc);
                $this->db->bind(':img' , $updateCategory->Img_Category);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }
        }

        public function findCategory($value) {

            $sql = "SELECT * FROM categories  WHERE  Category_Name LIKE :value LIMIT 16";
            try {
                $this->db->query($sql);
                $this->db->bind(":value" , $value . '%');
                $tags = $this->db->manyObjects();
                return $tags;
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }
    
    
    
        }

    }

?>