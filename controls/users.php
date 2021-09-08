<?php
require_once 'models/musers.php';
class Users  extends Musers {
    public function Index($id=0)
    {
        $users = $this->getUsers();
        require_once 'models/mdivisions.php';
        $div= new mDivisions();
        $divisions = $div->getDivisions();
        foreach ($users as $key => $user) {
            foreach ($divisions as  $value) {
                if($user['division'] == $value['id']) {
                    $users[$key]['division']= $value['name'];
                }
            }   
        }        
        require_once 'views/vusers.php';
    }
}