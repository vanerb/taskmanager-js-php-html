<?php
session_start();
include('Connection.php');
include('Crud.php');

if (isset($_SESSION['user'])) {

    $sqlConnection = new Connection();
    $sqlData = new crud();
    $sql = $sqlConnection->getConnection();

    $id = $_SESSION['user'];



    $result = $sqlData->getinfo("SELECT * FROM users WHERE id='$id'");


    $jsonData = array();

    while ($row = $result->fetch_assoc()) {
        $jsonData[] = $row;
    }

    echo json_encode($jsonData);
}
else{
    echo "500";
}
