<?php
    include_once "../connect.php"; 
    $officer_id="";
    $last_name="";
    $first_name="";
    $precinct="";
    $badge="";
    $phone="";
    $status="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $officer_id=$_POST["officer_id"];
        $last_name=$_POST["last_name"];
        $first_name=$_POST["first_name"];
        $precinct=$_POST["precinct"];
        $badge=$_POST["badge"];
        $phone=$_POST["phone"];
        $status=$_POST["status"];

        do{
            if(empty($officer_id) || empty($last_name) || empty($first_name) || empty($precinct) || empty($badge) || empty($phone) || empty($status)){
                $errorMessage = "All the fields are required";
                break; 
            }

             $sql = "INSERT INTO Officers(Officer_ID, Last_name, First_name, Precinct, Badge, Phone, Status)".VALUES('$officer_id', '$last_name', '$first_name', '$precinct', '$badge', '$phone', '$status')";
            $result = $conn ->query($sql);
            if(!$result){
                $errorMessage = "Invalid query: " . $conn->error;
                break;  
            }
            $officer_id="";
            $last_name="";
            $first_name="";
            $precinct="";
            $badge="";
            $phone="";
            $status="";

            $successMessage = "Client added correctly";
            //redirect to the table once the post request is finished  
            // and exit
            header("location: ../dev_pages/officers_dev.php");
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
        <h2>New Officer</h2>
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
                <label class = "col-sm-3 col-form-label" for = "">Officer ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "officer_id" value = "<?php echo $officer_id; ?>">
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
                <label class = "col-sm-3 col-form-label" for = "">Precinct</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "precinct" value = "<?php echo $precinct; ?>">
                </div>
            </div>
             <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Badge</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "badge" value = "<?php echo $badge; ?>">
                </div>
            </div>
             <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Phone</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "phone" value = "<?php echo $phone; ?>">
                </div>
            </div>
             <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Status</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "status" value = "<?php echo $status; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="../dev_pages/officers_dev.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

