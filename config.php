<?php
// Turninig on errors in PHP code directly
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$servername = "localhost";
$username = "diana";
$password = "motdepasse";
$dbname = "base_diana";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);


?>
