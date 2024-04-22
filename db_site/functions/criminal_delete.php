<?php
session_start();
include "../connect.php";
include '../user.php';


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// User is not logged in, redirect to login page
header('Location: ../login.html');
exit;
}

User::checkPerm();
User::checkPolice();

    if(isset($_GET["id"])){
         $criminal_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Criminals WHERE Criminal_ID = $criminal_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/criminals.php');
    exit; 


?>