<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $prob_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Prob_officer WHERE Prob_ID = $prob_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/prob_officers_dev.php');
    exit; 


?>