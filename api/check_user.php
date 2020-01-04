<?php

require('../common/mysql.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_POST['username'];
$password = $_POST['password'];
$sql= "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}
}
?>
