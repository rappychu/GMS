<?php

$server_name = "localhost";
$db_name = "gms";
$username = "root";
$password = "";

$con = mysqli_connect($server_name, $username, $password, $db_name);

if ($con->connect_error) {
    die("Connection Failed: " . $con->$connect_error);
}
?>