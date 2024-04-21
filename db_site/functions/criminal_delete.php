<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $criminal_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Criminals WHERE Criminal_ID = $criminal_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/criminals.php');
    exit; 


?>