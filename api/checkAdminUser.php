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
	

   $result1 ="SELECT password FROM admin WHERE email = '".$email."'";
   

   var_dump($result1);

   $result2 ="SELECT email FROM admin WHERE password = '".$password."'";

   	if($result2 == $email && $result1 == $password)
	{
		echo json_encode(array("message" => "Success"));
	}
	else
		{
			echo json_encode(array("message" => "Failure"));
		}

?>