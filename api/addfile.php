<?php 

require('../common/mysql.php');
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if (isset($_POST["import"])) 
{  
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) 
    {    
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into questions (id,question,subject_id)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
            $result = mysqli_query($con, $sqlInsert);

            var_dump($sqlInsert) or die();
            
            if (! empty($result))
            {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } 
            else 
            {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>