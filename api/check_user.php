<?php

require('../common/mysql.php');
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$email = $_POST['email'];
	$password = $_POST['password'];

	if(!isset($_POST['email'])||!isset($_POST['password']))
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
	

   $result1 ="SELECT password FROM users WHERE email = '".$email."'";
   
   // $result1=$db->execute($sql1);

   var_dump($result1);

   $result2 ="SELECT email FROM users WHERE password = '".$password."'";
   // var_dump($result2);
   	if($email == $result2 && $password == $result1)
	{
		echo json_encode(array("message" => "Success"));
	}
	else
		{
			echo json_encode(array("message" => "Failure"));
		}

?>
