<?php

class serviceTags implements InterfaceTags {
    private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }
    public function fetchAllTags()
    {
        $sql = "SELECT * FROM tags limit 7";
                try {
                    $this->db->query($sql);
                    $tags = $this->db->manyObjects();
                    return $tags;
                } catch (PDOException $e) {
                    echo "Error From Database" . $e->getMessage();
                }
    }
    public function addTag(Tags $newTags)
    {
        $sql = "INSERT INTO tags VALUES (:id , :name  , NOW() , NULL)";

            try {
                $this->db->query($sql);
                $this->db->bind(':id' , $newTags->ID_Tag);
                $this->db->bind(':name' , $newTags->Tag_name);
                $this->db->execute();


            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }
    }
    public function updateTag(Tags $updateTag)
    {
        $sql = "UPDATE tags SET Tag_name= :tagname, Updated_at= NOW() WHERE ID_tag = :id";

        try {
            $this->db->query($sql);
            $this->db->bind(':id' , $updateTag->ID_Tag);
            $this->db->bind(':tagname' , $updateTag->Tag_name);
            $this->db->execute();
        } catch (PDOException $e) {
            echo "Error From Database" . $e->getMessage();
        }
    }
    
    public function deleteTag($id_tag)
    {
        $sql = "DELETE FROM tags WHERE ID_tag = :id";
            try {
                $this->db->query($sql);
                $this->db->bind(":id" , $id_tag);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }
    }

    public function findTags($value) {

        $sql = "SELECT * FROM tags WHERE Tag_name LIKE :value LIMIT 16";
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