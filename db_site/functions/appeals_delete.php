<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $appeal_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Appeals WHERE Appeal_ID = $appeal_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/appeals_dev.php');
    exit; 


?>