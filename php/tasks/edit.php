<?php

include('../Connection.php');
include('../Crud.php');
session_start();
$database = new Crud();
$sqlConnection = new Connection();
$sql = $sqlConnection->getConnection();

$title = $_POST["title"];
$content = $_POST["content"];
$categories = $_POST["category"];
$id = $_GET['id'];
$user_id = $_SESSION["user"];



$data = array($title, $content, $categories, $user_id);

            
$database->editTask($data, $id);
echo "edited";

?>