<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (!mysqli_set_charset($conn, "utf8")) {
    die("Connection failed: " . $conn->connect_error);
    
} else {
     mysqli_character_set_name($conn);
}

?>