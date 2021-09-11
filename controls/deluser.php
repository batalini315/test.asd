<?php
require_once 'system/sql.php';
class DelUser extends Sql
{
    function index($id=0) {
        echo 'its id = '. $id;
        $this->DeleteForId($id,'users');
        $this->Redirect('/users/', false);
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

    

    