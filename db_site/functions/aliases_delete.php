<?php
    include_once "../connect.php";
    if(isset($_GET["id"])){
         $alias_id = $_GET["id"]; 

        

         $sql = "DELETE FROM Aliases WHERE Alias_ID = $alias_id";
         $conn -> query($sql); 

    }

    // //redirect the user into the table page. 
    header('location: ../dev_pages/aliases.php');
    exit; 


?>