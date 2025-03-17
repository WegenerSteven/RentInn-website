<?php
//Database configuration
$servername = "localhost"; //server name
$username = "root"; //database username
$password = ""; //database passord
$dbname = "Rent_Inn"; //database name

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
//configure charset
$conn->set_charset("utf8");
?>