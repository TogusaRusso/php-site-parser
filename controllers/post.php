<?php
    class PostController {
        private $model;
            
        public function __construct($model){
            $this->model = $model;
        }

        public function index() {
            // we store all the posts in a variable
            $url = '';
            $error = null;
            $elements = null;
            require_once('views/main.php');
        }

        public function post() {
            $url = $_POST['url'];
            $this->model->parse($url);
            $error = $this->model->error;
            $elements = $error ? null : $this->model->elements;
            require_once('views/main.php');
        }
    }
  
?>