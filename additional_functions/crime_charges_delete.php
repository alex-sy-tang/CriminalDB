<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $charge_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Crime_charges WHERE Charge_ID = $charge_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/crime_charges_dev.php');
    exit; 
?>
