<?php
    class ServiceWiki implements InterfaceWiki {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }

        public function addWiki(Wiki $newWiki , $tags = [])
        {
            $sql_1 = "INSERT INTO wikis VALUES (:id_wiki , :title , :content , :img , :id_user , :id_category , NOW())";

            try {
                $this->db->query($sql_1);
                $this->db->bind(":id_wiki" , $newWiki->id_wiki);
                $this->db->bind(":title" , $newWiki->wiki_title);
                $this->db->bind(":content" , $newWiki->wiki_content);
                $this->db->bind(":img" , $newWiki->wiki_img);
                $this->db->bind(":id_user" , $newWiki->id_user);
                $this->db->bind(":id_category",$newWiki->id_category);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }

            foreach($tags as $tag) {
                $sql_2 = "INSERT INTO wikitags VALUES(:id_tag , :id_user)";

                try {
                    $this->db->query($sql_2);
                    $this->db->bind(":id_tag" , $tag);
                    $this->db->bind(":id_user" , $newWiki->id_wiki);
                    $this->db->execute();
                    
                } catch (PDOException $e) {
                    echo "ERROR FROM DATABASE" . $e->getMessage();
                }
            }




        }

        public function fetchAllWikis()
        {
            $sql = "SELECT * FROM wikis";
            try {
                $this->db->query($sql);
                $wikis = $this->db->manyObjects();
                return $wikis;
            } catch (PDOException $e) {
                echo "Error From Database" . $e->getMessage();
            }
        }

        public function articlePage($id) {

            $sql = "SELECT * FROM wikis WHERE ID_wiki = :id";
            try {
                $this->db->query($sql);
                $this->db->bind(":id" , $id);
                $article = $this->db->oneObject();
                
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }
            $sql = "SELECT Wiki_title  FROM wikis ORDER BY Created_at DESC LIMIT 4";
            try {
                $this->db->query($sql);
                $latest_article = $this->db->manyObjects();
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }

            $sql = "SELECT * FROM tags limit 6";
                try {
                    $this->db->query($sql);
                    $tags = $this->db->manyObjects();
                } catch (PDOException $e) {
                    echo "Error From Database" . $e->getMessage();
                }
                $data = [
                    'article' => $article,
                    'latest_article' => $latest_article,
                    'tags' => $tags,
                ];
                return $data;
        }

        // Edit Article =====================
        public function updateArticle(Wiki $updateWiki , $tags = []){

            $sql_1 = "UPDATE `wikis` SET `Wiki_title`= :title ,`Wiki_content`= :content ,`Wiki_img`= :img ,`ID_category`= :id_category  WHERE ID_wiki = :id ";
            try {
                $this->db->query($sql_1);
                $this->db->bind(":id" , $updateWiki->id_wiki);
                $this->db->bind(":title" , $updateWiki->wiki_title);
                $this->db->bind(":content" , $updateWiki->wiki_content);
                $this->db->bind(":img" , $updateWiki->wiki_img);
                $this->db->bind(":id_category",$updateWiki->id_category);
                $this->db->execute();
            } catch (PDOException $e) {
                echo "ERROR FROM DATABASE" . $e->getMessage();
            }
            // Delete From table wikitags ==================
            $sql = "DELETE FROM wikitags WHERE id_wiki = :id";

                try {
                    $this->db->query($sql);
                    $this->db->bind(":id" , $updateWiki->id_wiki);
                    $this->db->execute();
                } catch (PDOException $e) {
                    echo "ERROR FROM DATABASE" . $e->getMessage();
                }
        

            // Add new tags =========================
            foreach($tags as $tag) {
                $sql_2 = "INSERT INTO wikitags VALUES(:id_tag , :id_wiki)";

                try {
                    $this->db->query($sql_2);
                    $this->db->bind(":id_tag" , $tag);
                    $this->db->bind(":id_wiki" , $updateWiki->id_wiki);
                    $this->db->execute();
                    
                } catch (PDOException $e) {
                    echo "ERROR FROM DATABASE" . $e->getMessage();
                }
            }

            // foreach($tags as $tag) {
            //     $sql_2 = "UPDATE wikitags SET  id_tag = :id_tag WHERE  ID_wiki = :id_wiki";
 
            //     try {
            //         $this->db->query($sql_2);
            //         $this->db->bind(":id_tag" , $tag);
            //         $this->db->bind(":id_wiki" , $updateWiki->id_wiki)
            //         $this->db->execute();
                    
            //     } catch (PDOException $e) {
            //         echo "ERROR FROM DATABASE" . $e->getMessage();
            //     }
            // }

        }

        public function deleteArticle($id) {

            $sql = "DELETE FROM wikis WHERE id_wiki = :id";

                try {
                    $this->db->query($sql);
                    $this->db->bind(":id" , $id);
                    $this->db->execute();
                } catch (PDOException $e) {
                    echo "ERROR FROM DATABASE" . $e->getMessage();
                }
        }

        public function findWiki($value) {

            $sql = "SELECT * FROM wikis  WHERE  Wiki_title LIKE :value LIMIT 8";
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