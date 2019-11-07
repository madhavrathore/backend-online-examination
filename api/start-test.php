<?php

require('mysql.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

//$data['user_id']
//$data['test_id']

try{
    $db = new mysql();
}catch (Exception $ex){
    return json_encode(['data' => false, 'error_message' => "connection failed"]);
}


$sql = "select * from test where id =" . $data['test_id'];
$test = $db->execute($sql, true);

if(!$test){
    return json_encode(['data' =>[]]);
}

$today = date("Y-m-d")
if($test->test_date != $today){
    return json_encode(['data' =>false, 'error_message' => "Not allowed to take test right now."]);
}

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
