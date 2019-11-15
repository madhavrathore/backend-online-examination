<?php

	require('../common/mysql.php');


	header("Content-Type: application/json");	
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$subject_id=$_GET['subject_id'];

	if(!isset($subject_id))
	{
			echo json_encode(array("error" => "Invalid request. Subject Id not found"));
			return;
	}

	try{
    	$db = new mysql();
	}
	catch (Exception $ex)
	{
    	echo json_encode(['data' => false, 'error_message' => "connection failed"]);
	}

	$sql="select * from questions where subject_id=" .$subject_id;

	$response = $db->execute($sql);

		if(!$response)
		{	
   			echo json_encode(["data" => []]);
		}

		echo json_encode(["data" => $response]);

?>
