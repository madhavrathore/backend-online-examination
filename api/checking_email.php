<?php

require('../common/mysql.php');
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$email = $_POST['email'];

if(!isset($_POST['email']))
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

$sql="SELECT email from users";
$row = mysqli_fetch_assoc($sql);
foreach ($row as $key => $email) 
{
	if(strcmp(.$row[email],$email))
	{
			echo "Mail Id Is already Present";
	}
}

$emails=db->execute($sql);
	

?>