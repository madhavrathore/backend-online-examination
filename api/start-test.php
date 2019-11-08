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
    return;
}

// echo json_encode($test);


$subjectSql = "select * from subjects where id = ". $test['subject_id'];

$subject = $db->execute($subjectSql, true);

if(empty($subject)){
    echo json_encode(['data' =>false, 'error_message' => "No subjects found."]);
    return;
}

$questionsSql = "select id, question from questions where subject_id = " . $subject['id'];

$questions = $db->execute($questionsSql);

if(empty($questions)){
    echo json_encode(['data' =>false, 'error_message' => "No question are provided."]);
    return;
}

foreach ($questions as $key => $que){
    $optionSql = "select id, value from question_options where question_id=" . $que['id'];
    $questions[$key]['option'] = $db->execute($optionSql);
}

$subject['questions'] = $questions;

$test['subject'] = $subject;

echo json_encode(['data' => $test]);

?>
