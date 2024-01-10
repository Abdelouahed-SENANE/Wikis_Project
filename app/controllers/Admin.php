<?php

    class Admin extends Controller {

        public function __construct()
        {
            
        }

        public function dashboard() {

            $data = [
                'page' => 'dashboard',
            ];
            $this->view('admin/dashboard' , $data);
        }


        // Pages Users
        public function users() {

            $data = [
                'page' => 'users',
            ];
            $this->view('admin/users' , $data);
        }
        public function wikis() {

            $data = [
                'page' => 'wikis',
            ];
            $this->view('admin/wikis' , $data);
        }
        public function categories() {

            $data = [
                'page' => 'categories',
            ];
            $this->view('admin/categories' , $data);
        }
        public function tags() {

            $data = [
                'page' => 'tags',
            ];
            $this->view('admin/tags' , $data);
        }
    }

?>