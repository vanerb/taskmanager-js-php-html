<?php
include('../Connection.php');
include('../Crud.php');

$database = new Crud();
$sqlConnection = new Connection();

$id = $_GET['id'];

$database->deleteTask($id);
echo "deleted";

?>