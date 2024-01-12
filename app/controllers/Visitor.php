
<?php 

    class Visitor extends Controller {
        private $tagService;
        public function __construct()
        {

            $this->tagService = new serviceTags();
        }


        public function tags() {
            // if ($_SESSION['roleofuser'] == 'Auteur') {
            //     // header('Location:' . URLROOT . '/pages/login');
            // }
            $this->view('visitor/tags');
        }
        public function findTags() {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $tags = $this->tagService->findTags($_GET['search']);
                if (isset($tags)) {
                    $response = [
                        'success' => true,
                        'tags' => $tags,
                    ];
                    // header('Content-type: application/json');
                    echo json_encode($response);
                    exit();
                }
                
            }




            $this->view('visitor/findTags');

        }
        public function categories() {
            // if ($_SESSION['roleofuser'] == 'Auteur') {
            //     // header('Location:' . URLROOT . '/pages/login');
            // }
            $this->view('visitor/categories');
        }
    }
    


?>