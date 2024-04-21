<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $sentence_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Sentencing WHERE Sentencing_ID = $sentence_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/sentences_dev.php');
    exit; 


?>