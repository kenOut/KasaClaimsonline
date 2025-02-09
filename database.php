<?php 
$servername = "localhost";
$username = "root";
$password = "@gbAnu1996!";
$dbname = "kasa_claims";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}else {
    echo"You are connected successfully";
}
?>