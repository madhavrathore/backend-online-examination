<?php
	
	require('../common/mysql.php');

	header("Content-Type: application/json");	
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$name=$_POST['name'];
	$institute_id=$_POST['institute_id'];
	$maxMarks=$_POST['max_marks'];
	$noOfQuestions=$_POST['no_of_questions'];
	$minimumPassingMarks=$_POST['min_passing_marks'];
	$examDuration=$_POST['exam_duration'];


	if(!isset($_POST['name'])||!isset($_POST['institute_id'])||!isset($_POST['max_marks'])||!isset($_POST['no_of_questions'])||!isset($_POST['min_passing_marks'])||!isset($_POST['exam_duration']))
	{
		echo json_encode(array("error" => "Invalid request. Values not found. Provide correct values"));
		return;
	}

	try{
			$db= new mysql();
	}
	catch(Exception $ex)
	{
			echo json_encode(["data" => false, 'error_message' => "connection failed"]);
	}

	$sql="INSERT INTO subjects(name,institute_id,max_marks,no_of_questions,min_passing_marks,exam_duration)  values('".$name."',".$institute_id.",".$maxMarks.",".$noOfQuestions.",".$minimumPassingMarks.",".$examDuration.")";
	echo($sql);die();

	if($db->connection->query($sql) === TRUE)
	{
		echo "Subjects added successfully";
	}
	else{
		http_response_code(500);
		echo "Failed to add the Subject";
	}

?>



