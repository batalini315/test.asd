<?php
require_once 'views/header.php';
$fulGet = $_GET['page'];
require_once 'system/router.php';
$Router = new Router();
$Router->index();
require_once 'views/footer.php';


