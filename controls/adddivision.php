<?php 
require_once 'models/mdivisions.php';
class AddDivision extends mDivisions
{        
    function index($num=0) 
    {
            // require 'controls/404.php';
            echo 'divisions number'. $num;
        

        if($_GET['name_division']) {
            if($this->IsDivision($_GET['name_division'])){
                $errorString = "Duble error";
            }
            else {
                $this->InsertDivision($_GET['name_division']);
                $this->Redirect('/divisions/', false);
            }
        }
        require_once 'views/vAddDivision.php';
    }

        function Redirect($url, $permanent = false)
        {
            if (headers_sent() === false)
            {
                header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
            }

            exit();
        }

        // Redirect('http://www.google.com/', false);
        
}