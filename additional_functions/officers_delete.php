<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $officer_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Officers WHERE Officer_ID = $officer_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/officers_dev.php');
    exit; 


?>