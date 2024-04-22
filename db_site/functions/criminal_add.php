<?php
    session_start();
    include "../connect.php";
    include '../user.php';


    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to login page
    header('Location: ../login.html');
    exit;
    }

    User::checkPerm();
    User::checkPolice();

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
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $criminal_id = $_POST["criminal_id"];
        $last_name = $_POST["last_name"];
        $first_name = $_POST["first_name"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $state_us = $_POST["state_us"];
        $zip = $_POST["zip"];
        $phone_number = $_POST["phone_number"];
        $v_status = $_POST["v_status"];
        $p_status = $_POST["p_status"];

        do{
             //if any of the input field is empty, 
            //return an error message and break out of the loop
            if(empty($criminal_id) || empty($last_name) || empty($first_name) || empty($street) || empty($city) || empty($state_us) || empty($zip) || empty($phone_number) || empty($v_status) || empty($p_status)){
                    $errorMessage = "All the fields are required";
                    break; 
            } 

            $sql = "INSERT INTO Criminals(Criminal_ID, Last_name, First_name, Street, City, State_US, Zip, phone_number, V_status, P_status)".
            "VALUES('$criminal_id', '$last_name', '$first_name', '$street', '$city', '$state_us', '$zip', '$phone_number', '$v_status', '$p_status')";
            $result = $conn ->query($sql);
            if(!$result){
                $errorMessage = "Invalid query: " . $conn->error;
                break;  
            }

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

            $successMessage = "Client added correctly";
            //redirect to the table once the post request is finished  
            // and exit
            header("location: ../dev_pages/criminals.php");
            exit;

            }while(false); 
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
    <script src = " https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class = "container my-5">
        <h2>New Criminal</h2>

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
                    <input type = "text" class = "form-contorl" name = "state_us" value = "<?php echo $state_us; ?>">
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