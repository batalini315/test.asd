<?php
require_once 'system/sql.php';
class MUsers extends Sql 
{
    public function getUsers()
    {
        return $this->queryRows('SELECT * from users') ;   
    }
    public function IsMail($mail)
    {
        return $this->IsRow("users", "email", $mail);    
    }

    public function InsertUser($arrayData)
    {        
        try {            
            $db = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $db->prepare("INSERT INTO users(email, name, address, phone, comment, division) VALUES (:email, :name, :address, :phone, :comment, :division)");
        
            $stmt->bindParam(':email',  $arrayData['email'],    PDO::PARAM_STR, 100);
            $stmt->bindParam(':name',   $arrayData['name'],     PDO::PARAM_STR, 100);
            $stmt->bindParam(':address', $arrayData['address'], PDO::PARAM_STR, 100);
            $stmt->bindParam(':phone',  $arrayData['phone'],    PDO::PARAM_STR, 100);
            $stmt->bindParam(':comment', $arrayData['comment'], PDO::PARAM_STR, 100);
            $stmt->bindParam(':division', $arrayData['division'], PDO::PARAM_INT);
        
            if($stmt->execute()) {
              echo '1 row has been inserted';  
            }        
            $db = null;
        } catch(PDOException $e) {
            trigger_error('Error occured while trying to insert into the DB:' . $e->getMessage(), E_USER_ERROR);
        }

    }
    public function GetUserForId($id)
    {
        return $this->GetItemForId($id, 'users');
    }

    public function DeleteUser($id)
    {
        $this->queryDelete('users',$id);
    }

    public function UpUser($id, $data)
    {
        try {
            $dbh = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
            $query = "UPDATE users SET email= :email,  name= :name , address= :address, phone= :phone, comment= :comment, division= :division WHERE id=".$id;
            $upd = $dbh->prepare($query);
            $update = $upd->execute(array(
                'email'=> $data['email'],
                'name'=> $data['name'],
                'address'=> $data['address'],
                'phone'=> $data['phone'],
                'comment'=> $data['comment'],
                'division'=> $data['division']
            ));
            if ($upd->execute()) {
                echo 'The publisher has been updated successfully!';
            }
            $upd = null;
            $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                $count = "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            // соединение больше не нужно, закрываем
            $sth = null;
            $dbh = null;    
    }
}