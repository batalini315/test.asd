<?php
require_once 'models/mdivisions.php';
class Divisions extends mDivisions
{   
    function index($id=0) 
    {    
        $divisions = $this->getDivisions();
        require_once 'views/vdivisions.php';
    }
}
?> 