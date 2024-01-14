<?php

    class Wiki {
        private $id_wiki;
        private $wiki_title;
        private $wiki_content;
        private $wiki_img;
        private $id_user;
        private $id_category;

        public function __set($name, $value)
        {
            if (property_exists($this , $name)) {
                return $this->$name = $value;
            }
        }
        public function __get($name)
        {
            if (property_exists($this , $name)) {
                return $this->$name;
            }
        }




    }


?>