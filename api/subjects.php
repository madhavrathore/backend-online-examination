<?php

	require('../common/mysql.php');

 	header("Content-Type: application/json");	
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$instituteId=$_GET['institute_id'];

	if(!isset($_GET['institute_id']))
	{
		echo json_encode(array("error" => "Invalid request. Institute Id not found."));
		return;
	}


	try{
    	$db = new mysql();
	}
	catch (Exception $ex){
    	return json_encode(['data' => false, 'error_message' => "connection failed"]);
	}


	$sql = "select * from subjects where institute_id=" .$instituteId;
	$response = $db->execute($sql);

	if(!$response){	
    	echo json_encode(["data" => []]);
	}		

	echo json_encode(["data" => $response]);
?>