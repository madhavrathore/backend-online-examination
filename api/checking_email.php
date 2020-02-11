<?php

require('../common/mysql.php');
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$email = $_POST['email'];

if(!isset($email))
{
	echo json_encode(array("error" => "Invalid request.Enter a Email"));
	return;
}
try
{
		$db=new mysql();
}
catch(Exception $ex)
{
		return json_encode(['data' => false, 'error_message' => "connection failed"]);
}

$sql="SELECT email from users where email='".$email."'";


if($db->connection->query($sql) === true)
{
	echo json_encode(array("error_message" => "Email Id is already present"));
}

?>