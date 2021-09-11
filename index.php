<?php
require_once 'views/header.php';
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
// print_r($url);
// $fulGet = $_GET['page'];
require_once 'system/router.php';
$Router = new Router();
$Router->Index($url);
require_once 'views/footer.php';


