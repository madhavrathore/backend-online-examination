<?php
	
	require('../common/mysql.php');

	header("Content-Type: application/json");	
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$name=$_POST['name'];
	$id=$_POST['id'];

	if(!isset($_POST['name']) && !isset($id))
	{
		echo json_encode(array("error" => "Invalid update request. Name not found. Provide a name to update"));
		return;
	}

	try{
			$db= new mysql();
	}
	catch(Exception $ex)
	{
			echo json_encode(["data" => false, 'error_message' => "connection failed"]);
	}

	$sql="Update institutes SET name=$name where id=$id"	;

	var_dump($sql);
	die;

	if($db->connection->query($sql) === TRUE)
	{
		echo "Institute updated successfully";
	}
	else{
		http_response_code(500);
		echo "Failed to add the Institute";
	}

?>