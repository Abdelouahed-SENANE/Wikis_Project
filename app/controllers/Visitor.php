
<?php 

    class Visitor extends Controller {



        public function tags() {
            // if ($_SESSION['roleofuser'] == 'Auteur') {
            //     // header('Location:' . URLROOT . '/pages/login');
            // }
            $this->view('visitor/tags');
        }
    }
    


?>