<?php
// To use PDO to connect to a database, you need the following information:
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "Milestone_Project3";
// database connection
$conn = mysqli_connect($servname, $username, $password, $dbname);
if(!$conn){
    die("ERROR--The Connection is failed: " . mysqli_connect_error());
}
?>
