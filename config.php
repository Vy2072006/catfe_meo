<?php

//portal
$servername = "localhost";
$port = "3306";
$username = "root";
$password = "";
$database = "catfe_meo";

//connect
$conn = new mysqli($servername, $username, $password, $database, $port);

//check connection
if ($conn->connect_error) {
    die("Couldn't connect to DB" . mysqli_connect_error());
}
