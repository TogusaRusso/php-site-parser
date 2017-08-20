<?php
require_once('controllers/post.php');
if (isset($_POST['url']) && !empty($_POST['url'])) {
    require_once('models/parser.php');
    $parser = new Parser('h1');
    $controller = new PostController($parser);
    $controller->post();
} else {
    // if POST is empty there is no reason for model yet 
    $controller = new PostController(null);
    $controller->index();
}
