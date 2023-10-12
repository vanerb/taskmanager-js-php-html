<?php

include('../Connection.php');
include('../Crud.php');
session_start();
$database = new Crud();
$sqlConnection = new Connection();
$sql = $sqlConnection->getConnection();

$name = $_POST["name"];
$id = $_GET['id'];
$user_id = $_SESSION["user"];

$data = array($name, $user_id);

            
$database->editCategories($data, $id);
echo "edited";

?>