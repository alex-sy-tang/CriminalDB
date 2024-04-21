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

if(isset($_GET["id"])){
         $alias_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Aliases WHERE Alias_ID = $alias_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/aliases.php');
    exit; 


?>