<?php

    class ServiceDashboard {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }
    
        public function countRecorsTable() {

            $sql = "SELECT COUNT(*) AS number_records , 'user' AS table_name  FROM user  
              UNION 
              SELECT COUNT(*)  AS number_records , 'categories' AS table_name  FROM categories 
              UNION 
              SELECT COUNT(*) AS number_records , 'wikis' AS table_name  FROM wikis 
              UNION 
              SELECT COUNT(*) AS number_records , 'tags' AS table_name  FROM tags 
            ";
            try {
                $this->db->query($sql);
                $statistics = $this->db->manyObjects();
                return $statistics;
            } catch (PDOException $e) {
                echo "ERROR DATABASE" . $e->getMessage();
            }



        }
        public function createWikiByCategory() {
            $sql = "SELECT categories.Category_Name, COUNT(wikis.ID_wiki) AS wiki_count
            FROM categories
            LEFT JOIN wikis ON categories.ID_category = wikis.ID_category
            GROUP BY categories.Category_Name
            ORDER BY wiki_count DESC LIMIT 6";
            try {
                $this->db->query($sql);
                $wiki_category = $this->db->manyObjects();
                return $wiki_category;
            } catch (PDOException $e) {
                echo "ERROR DATABASE" . $e->getMessage();
            }
        }

        public function getTotalRowCount() {
            $sql = "
                SELECT SUM(total_rows) AS total_rows
                FROM (
                    SELECT COUNT(*) AS total_rows FROM user
                    UNION 
                    SELECT COUNT(*) FROM categories
                    UNION 
                    SELECT COUNT(*) FROM wikis
                    UNION 
                    SELECT COUNT(*) FROM tags
                ) AS table_counts
            ";
        
            try {
                $this->db->query($sql);
                $totalRowCount = $this->db->oneObject();
                return $totalRowCount;
            } catch (PDOException $e) {
                echo "ERROR DATABASE" . $e->getMessage();
            }
        }

        public function getTableRowCounts() {
            $sql = "
                SELECT 'user' AS table_name, COUNT(*) AS total_rows FROM user
                UNION 
                SELECT 'categories' AS table_name, COUNT(*) AS total_rows FROM categories
                UNION 
                SELECT 'wikis' AS table_name, COUNT(*) AS total_rows FROM wikis
                UNION 
                SELECT 'tags' AS table_name, COUNT(*) AS total_rows FROM tags
            ";
        
            try {
                $this->db->query($sql);
                $tableRowCounts = $this->db->manyObjects();
                return $tableRowCounts;
            } catch (PDOException $e) {
                echo "ERROR DATABASE" . $e->getMessage();
                // Handle the error appropriately (logging, etc.)
            }
        }

    }


?>