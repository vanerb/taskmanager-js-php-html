<?php

include('../Connection.php');
include('../Crud.php');

$database = new Crud();
$sqlConnection = new Connection();
$sql = $sqlConnection->getConnection();

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$reppassword = $_POST["repcontrasena"];

if($password == $reppassword){
    $data = array($name, $email, md5($password));

            
    $database->addUser($data);
    echo "added";
}

?>