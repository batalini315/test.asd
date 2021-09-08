<?php
require_once 'system/sql.php';
class Deldivision extends Sql
{
    function index($id=0) {
        echo 'its id = '. $id;
        $this->DeleteForId($id,'divisions');
        $this->Redirect('/divisions/', false);
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

    

    