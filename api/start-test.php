<?php

require('../common/mysql.php');

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if(!isset($_POST['test_id'])){
	echo json_encode(array("error" => "Invalid request. required test id."));
}

$testId = $_POST['test_id'];

try{
    $db = new mysql();
}catch (Exception $ex){
    echo json_encode(['data' => false, 'error_message' => "connection failed"]);
}

$today = date("Y-m-d");
$sql = "select * from tests where id =" . $testId . " and test_date = '" . $today . "'";
$test = $db->execute($sql, true);

if(!$test){
    echo json_encode(['data' =>[]]);
}

// echo json_encode($test);

$subjectSql = "select * from subject where id=" . $test->subject_id;

$test->subject = $db->execute($subjectSql, true);
if(empty($test->subject)){
    return json_encode(['data' =>false, 'error_message' => "No subjects found."]);
}

$questionsSql = "select * from question where subject_id = " . $test->subject->id;
$questions = $db->execute($quetionsSql);

if(empty($questions)){
    return json_encode(['data' =>false, 'error_message' => "No question are provided."]);
}

foreach ($questions as $key => $que){
    $optionSql = "select * from question_options where que_id=" . $que->id;
    $questions[$key]->option = $db->execute($optionSql);
}

$test->subject->questions = $questions;

return json_encode(['data' => $test]);


?>
