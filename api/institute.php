<?php

require('../common/mysql.php');

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

#$_GET['xyz'] to read values
#isset will check xyz key persent or not


#$_POST['xyz'] to read values
#isset will check xyz key persent or not


try{
    $db = new mysql();
}
catch (Exception $ex){
    return json_encode(['data' => false, 'error_message' => "connection failed"]);
}


$sql = "select name from institutes";
$response = $db->execute($sql);

if(!$response){	
    echo json_encode(["data" => []]);
}

echo json_encode(["data" => $response]);
?>