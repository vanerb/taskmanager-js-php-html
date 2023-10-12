<?php

include('../Connection.php');
include('../Crud.php');
session_start();

$database = new Crud();
$sqlConnection = new Connection();
$sql = $sqlConnection->getConnection();


$email = $_POST["email"];
$password = $_POST["password"];

$passwordMD5 = md5($password);

$result = $database->getinfo("SELECT * FROM users WHERE email = '$email' AND password = '$passwordMD5'");


if ($result->num_rows === 1) {
    // Se encontró un usuario con el correo y la contraseña proporcionados
    $user = $result->fetch_assoc();
    $_SESSION['user'] = $user['id'];
    echo "logged";
} else {
    // No se encontró un usuario con el correo y contraseña proporcionados
    echo "Login failed. Please check your email and password.";
}






?>