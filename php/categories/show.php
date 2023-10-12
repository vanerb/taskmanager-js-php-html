<?php

include('../Connection.php');
include('../Crud.php');
session_start();

$sqlConnection = new Connection();
$sqlData = new crud();

$sql = $sqlConnection->getConnection();
$user_id = $_SESSION["user"];


$result = $sqlData->getinfo("SELECT * FROM category WHERE user_id = '$user_id'");

$jsonData = array();

while ($row = $result->fetch_assoc()) {
    $jsonData[] = $row;
}

echo json_encode($jsonData);
?>