<?php

if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
{
    header('Location: index.php');
    exit();
}

require_once "database.php";

$email = $_POST['email'];
$password = $_POST['password'];

echo $email."</br>";
echo $password;

if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
{
    header('Location: index.php');
    exit();
}

?>