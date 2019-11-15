<?php

	require('../common/mysql.php');

	header("Content-Type: application/json");	
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$name=$_POST['name'];

	if(!isset($_POST['name']))
	{
		echo json_encode(array("error" => "Invalid request. Name not found. Provide a name"));
		return;
	}

	try{
			$db= new mysql();
	}
	catch(Exception $ex)
	{
			echo json_encode(["data" => false, 'error_message' => "connection failed"]);
	}

	$sql="INSERT INTO institutes (name) values('".$name."')";

	var_dump($sql);die;

	if($db->connection->query($sql) === TRUE)
	{
		echo "Institute added successfully";
	}
	else{
		http_response_code(500);
		echo "Failed to add the Institute";
	}

?>


