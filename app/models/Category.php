
<?php 
    class Category {
        private $ID_category;
        private $Category_Name;
        private $Category_Desc;
        private $Img_Category;


        public function __construct()
        {
            
        }

        public function __get($proprety)
        {
            if (property_exists($this , $proprety)) {
                return $this->$proprety;
            }
        }

        public function __set($proprety, $value)
        {
            if (property_exists($this , $proprety)) {
                return $this->$proprety = $value;
            }
        }



    }
?>