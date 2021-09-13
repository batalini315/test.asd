<?php
class Router {
    public function index($url = [])
    {      
        $routerArray = [
            'users'         =>  'Users',
            'adduser'       =>  'AddUser',
            'upuser'        =>  'UpUser',
            'deluser'       =>  'DelUser',
            'divisions'     =>  'Divisions',
            'adddivision'   =>  'AddDivision',
            'updivision'    =>  'UpDivision',
            'deldivision'   =>  'DelDivision'  
        ]  ;
        $nameFile=(!$p= $url[0]) ?$routerArray['users']: $routerArray[$url[0]];
        $method = $url[1]??0;
        if($nameFile == '') {
            $nameFile =  $p; 
        };
        $fn = ($url[0]) ? 'controls/' . $nameFile . '.php' : 'controls/Users.php';
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