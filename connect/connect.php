<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "blood_donation";

$conn = mysqli_connect($host, $user, $pass, $db);
//$conn = new mysqli('localhost', 'root', ' ', 'blood_donation');

if($conn->connect_error)
{
    echo "Failed to connect to Database".$conn->connect_error;
}

?>