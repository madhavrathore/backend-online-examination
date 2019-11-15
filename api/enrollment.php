<?php
	
	require('../common/mysql.php');


	header("Content-Type: application/json");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	if(!isset($_POST[''])){
			echo json_encode(array("error" => "Not yet enrolled for the exam."));
	}

	try{
    	$db = new mysql();
	}
	catch (Exception $ex){
    	return json_encode(['data' => false, 'error_message' => "connection failed"]);
	}
	$subject="select * from subjects where name="

	$sql="select * from tests where id=" .$test->subject_id;
	$tests=$db->execute($sql, true);




