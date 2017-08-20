<?php
require_once('controllers/post.php');
if (isset($_POST['url']) && !empty($_POST['url'])) {
    require_once('models/parser.php');
    $parser = new Parser('h1');
    $controller = new PostController($parser);
    $controller->post();
} else {
    $controller = new PostController(null);
    $controller->index();
}
