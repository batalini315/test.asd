<?php
class Router {
    public function index()
    {        
        $fulGet=(!$p= $_GET) ?'users': $_GET['page'];
        $nameFile =  stristr($fulGet, '/', true);
        $method = stristr($fulGet, '/');
        $method = substr($method, 1);

        if($nameFile == '') {
            $nameFile =  $fulGet; 
        };
        $fn = ($_GET['page']) ? 'controls/' . $nameFile . '.php' : 'controls/users.php';
        if(file_exists($fn))  {
            require $fn;
            $nameClass = ucwords($nameFile);
            $Class = new $nameClass();
            if( is_numeric($method)) {
                $Class->index((int) $method);
            } else {
                $Class->index(0);
            }

        } else {
            require 'controls/404.php';
        } 
        

    }

    function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }
}