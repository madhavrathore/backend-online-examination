<?php

require('../common/mysql.php');

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $data = json_decode(file_get_contents("php://input"));

try{
    $db = new mysql();

}catch (Exception $ex){
    return json_encode(['data' => false, 'error_message' => "connection failed"]);
}


$sql = "select * from institute;";
$response = $db->execute($sql);

if(!$response){	
    echo json_encode(["data" => []]);
}

echo json_encode(["data" => $response]);
?>