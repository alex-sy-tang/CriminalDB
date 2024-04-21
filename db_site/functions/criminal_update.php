<?php
include_once "../connect.php"; 

//$id = "";
$criminal_id="";
$last_name="";
$first_name="";
$street="";
$city="";
$state_us="";
$zip="";
$phone_number="";
$v_status="";
$p_status="";

$errorMessage = "";
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["criminal_id"])){
        header("location: ../dev_pages/criminals.php");
        exit; 
    }

    $id = $_GET["criminal_id"];

    //read the row of the selcted client from the database
    $sql = "SELECT * FROM Criminals WHERE Criminal_ID = $criminal_id "; 
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    
    if(!$row){
        header("location: ../dev_pages/criminals.php"); 
        exit; 
    }

    // $id = $row["id"];
    $criminal_id = $row["criminal_id"]; 
    $last_name= $row["last_name"];
    $first_name=$row["first_name"];
    $street=$row["street"];
    $city=$row["city"];
    $state_us=$row["state_us"];
    $zip=$row["zip"];
    $phone_number=$row["phone_number"];
    $v_status=$row["v_status"];
    $p_status=$row["p_status"];

}else{
    $criminal_id = $_POST["criminal_id"]; 
    $last_name= $_POST["last_name"];
    $first_name=$_POST["first_name"];
    $street=$_POST["street"];
    $city=$_POST["city"];
    $state_us=$_POST["state_us"];
    $zip=$_POST["zip"];
    $phone_number=$_POST["phone_number"];
    $v_status=$_POST["v_status"];
    $p_status=$_POST["p_status"];

    //echo($alias_id);
    

    do{

        // if(empty($criminal_id) || empty($alias)){
        //     $errorMessage = "All the fileds are required"; 
        //     break; 
        // }


/*        if(empty($last_name) || empty($first_name) || empty($street) || empty($city) || empty($state_us) || empty($zip) || empty($phone_number) || empty($v_status) || empty($p_status)){
            $errorMessage = "All the fields are required";
            break; 
        }*/
        if(!empty($last_name)){
            $sql = "UPDATE Criminals SET Last_name = '$last_name' WHERE Criminal_ID = $criminal_id"; 
        }
        elseif (!empty($first_name)) {
             $sql = "UPDATE Criminals SET First_name = '$first_name' WHERE Criminal_ID = $criminal_id"; 
        }
/*        elseif (!empty($street) && !empty($city) && && !empty($state_US) && !empty($zip)) {
             $sql = "UPDATE Criminals SET Street= '$street' WHERE Criminal_ID = $criminal_id"; 
        }*/
         elseif (!empty($street)){
            $sql = "UPDATE Criminals SET Street= '$street' WHERE Criminal_ID = $criminal_id"; 
         }
         elseif(!empty($city)){
             $sql = "UPDATE Criminals SET City= '$city' WHERE Criminal_ID = $criminal_id"; 
         }
         elseif(!empty($state_us)){
             $sql = "UPDATE Criminals SET State_US= '$state' WHERE Criminal_ID = $criminal_id"; 
         }
        elseif(!empty($zip)){
             $sql = "UPDATE Criminals SET Zip= '$zip' WHERE Criminal_ID = $criminal_id"; 
         }
        elseif(!empty($phone_number)){
             $sql = "UPDATE Criminals SET phone_number= '$phone_number' WHERE Criminal_ID = $criminal_id"; 
         }
        elseif(!empty($v_status)){
             $sql = "UPDATE Criminals SET V_status= '$v_status' WHERE Criminal_ID = $criminal_id"; 
         }
        elseif(!empty($p_status)){
             $sql = "UPDATE Criminals SET P_status= '$p_status' WHERE Criminal_ID = $criminal_id"; 
         }
         else{
            $errorMessage = "At least one field is required to update";
            break; 

         }


/*        $sql = "UPDATE Criminals SET Criminal = '$criminal' WHERE Criminal_ID = $criminal_id";*/ 

        $result = $conn -> query($sql); 

        if(!$result){
            $errorMessage = "Invalid query: ". $conn -> error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location: ../dev_pages/criminals.php"); 
        exit; 

    }while(false); 
    // The REQUEST METHOD IS POST

    //read the data from the input
    //and store it into the variables
    //for update purposes
    //$alias_id = $_POST["alias_id"];
    
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class = "container my-5">
        <h2>Update Criminals</h2>

        <?php
        if( !empty($errorMessage)){
            echo "
            <div class = 'alert alert-warning alert-dimissible fade show' role = 'alert'>
                <strong>$errorMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss-'alert' aria-label = 'Close'></button>
            </div>
            ";
        }
        ?>

        <form method = "post">
            <input type="hidden" name = "criminal_id" value = "<?php echo $criminal_id; ?>">
            <input type="hidden" name = "last_name" value = "<?php echo $last_name; ?>">
            <input type="hidden" name = "first_name" value = "<?php echo $first_name; ?>">
            <input type="hidden" name = "street" value = "<?php echo $street; ?>">
            <input type="hidden" name = "city" value = "<?php echo $city; ?>">
            <input type="hidden" name = "state_us" value = "<?php echo $state_us; ?>">
            <input type="hidden" name = "zip" value = "<?php echo $zip; ?>">
            <input type="hidden" name = "phone_number" value = "<?php echo $phone_number; ?>">
            <input type="hidden" name = "v_status" value = "<?php echo $v_status; ?>">
            <input type="hidden" name = "p_status" value = "<?php echo $p_status; ?>">

            <!-- <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Criminal ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "criminal_id" value = "">
                </div>
            </div> -->
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Criminal ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "criminal_id" value = "<?php echo $criminal_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Last Name</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "last_name" value = "<?php echo $last_name; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">First Name</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "first_name" value = "<?php echo $first_name; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Street</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "street" value = "<?php echo $street; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">City</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "city" value = "<?php echo $city; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">State US</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "last_name" value = "<?php echo $last_name; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Zip</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "zip" value = "<?php echo $zip; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Phone Number</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "phone_number" value = "<?php echo $phone_number; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Violent Offender Status</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "v_status" value = "<?php echo $v_status; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Probation Status</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "p_status" value = "<?php echo $p_status; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="../dev_pages/criminals.php" role = "button">Cancel</a>
                </div>
            </div> 
        </form>
    </div>
    
</body>
</html>