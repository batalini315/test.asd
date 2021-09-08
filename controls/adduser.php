<?php 
require_once 'models/musers.php';
class Adduser extends Musers {
    public function index($id=0)        
    {
        require_once 'models/mdivisions.php';
        $sqlDivisions = new mDivisions();
        $divisions = $sqlDivisions->getDivisions();
        
        if($_GET['email']) {
            if($this->IsMail($_GET['email'])){
                $errorString = "Duble error";
            }
            else {
                $res = $this->InsertUser($_GET);
                print_r($res);
                $this->Redirect('/users/', false);
            }
        }
         require_once 'views/vadduser.php';
    }

       

    function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }

        exit();
    }
    // Redirect('http://www.google.com/', false);\
}