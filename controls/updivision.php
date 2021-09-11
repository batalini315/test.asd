<?php
require_once 'models/mdivisions.php';
/**
 * [Description Updivision]
 */
class UpDivision extends mDivisions 
{
    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    function index($id) {        
        $division = $this->getItenForId($id, 'divisions'); 
        require_once 'views/vupdivision.php';
        if($_GET['name_division']){
            $this->UpDivision($_GET['id'], $_GET['name_division']);
            $this->Redirect('/divisions/', false);
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
    