<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $crime_code = $_GET["id"]; 

        

         $sql = "DELETE FROM Crime_charges WHERE Crime_code = $crime_code";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/crime_codes_dev.php');
    exit; 


?>