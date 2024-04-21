<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $crimes_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Crimes WHERE Crimes_ID = $crimes_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/crimes_dev.php');
    exit; 


?>