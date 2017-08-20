<?php
class PostController 
{
    private $model;
        
    public function __construct($model)
    {
        $this->model = $model;
    }
    
    // default action when there's no user's input
    public function index() 
    {
        $url = '';
        $error = null;
        $elements = null;
        require_once('views/main.php');
    }
    
    // default action when there's no user's input
    public function post() 
    {
        $url = $_POST['url'];
        $this->model->parse($url);
        $error = $this->model->error;
        $elements = $error ? null : $this->model->elements;
        require_once('views/main.php');
    }
}
