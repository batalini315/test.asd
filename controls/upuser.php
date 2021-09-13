<?php
require_once 'models/mdivisions.php';
require_once 'models/musers.php';
/**
 * [Description Upuser]
 */
class UpUser extends MUsers {
    /**
     * @param mixed $id=0
     * 
     * @return [type]
     */
    function Index($id=0) {
        
        $sqlDivisions = new mDivisions();
        $divisions = $sqlDivisions->getDivisions();
        $user = $this->GetUserForId($id);
        $user = $user[0];

        require_once 'views/vupuser.php';
        // print_r($user)  ;
        if($_GET['email'])
        {                      
            $res =$this->UpUser($_GET['id'],$_GET);            
            $this->Redirect('/users/', false);
        }
    }

        /**
         * @param string $url
         * @param bool $permanent
         * 
         * @return [type]
         */
        function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }

}        
    