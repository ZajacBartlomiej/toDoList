<?php 

$server = "localhost";
$username = "";
$password = "";
$db_name = "todo";

try {
    $connect = new PDO("mysql:host=$server;db_name=$db_name;", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
    echo "connected!";
}catch(PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
}