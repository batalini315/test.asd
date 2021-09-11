<?php
    require_once 'system/sql.php';
      
    class MDivisions  extends Sql {
    function getDivisions() {
            $arr = $this->queryRows('SELECT * FROM divisions');
        return $arr;
    }
    function getDivision($id) {
            $arr = $this->queryRows('SELECT * FROM divisions WHERE id='.$id);
        return $arr;
    }
    public function IsDivision($name)
    {
        return $this->IsRow("division", "name_division", $name);    
    }

    public function InsertDivision($name)
    {
        try {
            $db = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $db->prepare("INSERT INTO divisions(name) VALUES (:name)");
        
            $stmt->bindParam(':name', $name, PDO::PARAM_STR, 100);
        
            if($stmt->execute()) {
              echo '1 row has been inserted';  
            }
        
            $db = null;
        } catch(PDOException $e) {
            trigger_error('Error occured while trying to insert into the DB:' . $e->getMessage(), E_USER_ERROR);
        }

    }
    public function DeleteDivision($id)
    {
        $this->queryDelete('divisiion',$id);
    }

    public function UpDivision($id, $name)
    {
        try {
            $dbh = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
            $query = "UPDATE divisions SET name= :name WHERE id=".$id;
            $upd = $dbh->prepare($query);
            $update = $upd->execute(array('name'=> $name));

            // $sql = "UPDATE `:table` SET :field = ':val' WHERE `:idf` = :id;";      
            // $upd = $mysql->prepare($sql);
            // $update = $upd->execute(array(
            //     'table'=>$table,
            //     'field'=>$fields[$j],
            //     'val'=>$rs,
            //     'idf'=>$prim,
            //     'id'=>$row[0]
            //     ));
            if ($upd->execute()) {
                echo 'The publisher has been updated successfully!';
            }
            // $count = $dbh->exec($query );
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
        return $count;    
    }
}