<?php

require('../common/mysql.php');

function create()
{
 
    // query to insert record
    $query = "INSERT INTO" . $this->table_name . "SET

                name=:name, email=:eamil, phone_number=:phone_number, password=:password, created=:created";
 
    // prepare query
    $smt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $smt->bindParam(":name", $this->name);
    $smt->bindParam(":email", $this->email);
    $smt->bindParam(":discription", $this->description);
    $smt->bindParam(":phone_number", $this->phone_number);
    $smt->bindParam(":password", $this->password);
    $smt->bindParam(":created", $this->created);
 
    // execute query
    if($smt->execute())
    {
        return true;
    }
 
    return false;
     
}