<?php

    class Tags {
        private $ID_Tag;
        private $Tag_name;


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