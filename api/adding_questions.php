<?php

	require('../common/mysql.php');

	header("Content-Type: application/json");	
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$question=$_POST['question'];
	$subject_id=$_POST['subject_id'];

	if(!isset($_POST['question'])||!isset($_POST['subject_id']))
	{
		echo json_encode(array("error" => "Invalid request. Provide correct values"));
		return;
	}

	try{
			$db= new mysql();
	}
	catch(Exception $ex)
	{
			echo json_encode(["data" => false, 'error_message' => "connection failed"]);
	}

	$sql="INSERT INTO questions (question,subject_id) values('".$question."',".$subject_id.")";

	var_dump($sql);die;

	if($db->connection->query($sql) === TRUE)
	{
		echo "Questions added successfully";
	}
	else{
		http_response_code(500);
		echo "Failed to add the Institute";
	}

?>
