<?php


required('../common/mysql.php');

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
    // user object declaration
class user{

    public $id;
    public $name;
    public $email;
    public $password;
}
 
 try{
        $db= new mysql();
    }
catch (Exception $ex)
{
    return json_encode(['data' => false, 'error_message' => "connection failed"]);
}
    $user = new user($db);

    $data = json_decode(file_get_contents("php://input"));

    $user->name = $data->name;
    $user->email = $data->email;
    $user->password = $data->password;


if(
    !empty($user->firstname) &&
    !empty($user->email) &&
    !empty($user->password) &&
    $user->create()
)
{
 
    http_response_code(200);
 
    echo json_encode(array("message" => "User was created."));
}
 
else{
 
    http_response_code(400);
 
    echo json_encode(array("message" => "Unable to create user."));
}


function create()
   {
 
    $query = "INSERT INTO " . $this->table_name . "
            SET
                name = :name,
                email = :email,
                password = :password";

    $user=$db->execute($query , true);
 
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
 

    $user->bindParam(':name', $this->name);
    $user->bindParam(':email', $this->email);
 
    // hash the password before saving to database
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $user->bindParam(':password', $password_hash);
 
    // execute the query, also check if query was successful
    if($user->execute())
    {
        return true;
    }
 
    return false;
    }


  ?>  