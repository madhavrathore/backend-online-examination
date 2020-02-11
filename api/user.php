<?php

require('../common/mysql.php');
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
 
$username=$_POST['name'];
$emailId=$_POST['email'];
$password=$_POST['password'];
$phoneNumber=$_POST['phone-number'];
$dob=$_POST['date'];
$gender=$_POST['gender'];


    if(!isset($username) || !isset($emailId) || !isset($password) || !isset($phoneNumber)||!isset($dob)||!isset($gender))
    {
        echo json_encode(array("error" => "Invalid request.Values Not Provided"));
        return;
    }

 try{
        $db= new mysql();
    }
    catch (Exception $ex)
    {
        return json_encode(['data' => false, 'error_message' => "connection failed"]);
    }
    
    $sql="INSERT INTO users(name,email,password,phone_number,date_of_birth,gender) 
    values('".$username."','".$emailId."','".$password."','".$phoneNumber."','".$dob."','".$gender."')";
    
    if($db->connection->query($sql) === TRUE)
    {
        
        return json_encode(['data' => false, 'error_message' => "INFO : Success to updated record"]);
    }
    else{
        http_response_code(500);
        return json_encode(['data' => false, 'error_message' => "Error : Failed to update record"]);
    }
 ?>  
