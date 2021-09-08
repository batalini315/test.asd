<?php

require_once 'config/database.php';
class Sql  extends Database {
    public function queryRows($query)
    {
        try {
                $dbh = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
                $res=[];
                $sd = $dbh->query($query,  PDO::FETCH_ASSOC);
                foreach($sd as $row ) {
                    $res[]=$row;
                }
                $dbh = null;
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
                // соединение больше не нужно, закрываем
                $sth = null;
                $dbh = null;        
        return $res;
    }

    public function getItenForId($id, $table)
    {
        $db = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
                $res=[];
        $stmt = $db->prepare("SELECT * FROM ".$table." WHERE `id` = ?");
        $stmt->execute([$id]);
        $category = $stmt->fetch(PDO::FETCH_LAZY);
        return $category;
    }
    public function queryDelete($table, $id)
    {
        try {
                $dbh = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
                $count = $dbh->exec("DELETE FROM ".$table."WHERE id=".$id );
                $dbh = null;
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
                // соединение больше не нужно, закрываем
                $sth = null;
                $dbh = null;        
        return $count;
    }
    
    public function GetItemForId($id, $table)
    {
        return $this->queryRows('SELECT * FROM '.$table.' WHERE id = '. $id);
    }

    public function IsRow($table, $argum, $where)
    {
        try {
            $dbh = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
            $count = $dbh->exec("SELECT * FROM ".$table." WHERE ". $argum. " = '". 
            $where."'");
            $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            // соединение больше не нужно, закрываем
            $sth = null;
            $dbh = null;        
    return $count;
    }
    // "INSERT INTO test(id, label) VALUES (1, 'a')"
    public function DeleteForId($id, $table)
    {
        $pdo = new PDO('mysql:host='.$this->server.';dbname='.$this->base, $this->username, $this->password);
        $query = "DELETE FROM `".$table."` WHERE `id` = ?";
        $params = [$id];
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $pdo = null;
    }
        
    

   
}

?>