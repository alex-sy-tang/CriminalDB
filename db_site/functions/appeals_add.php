<?php
    include_once "../connect.php"; 
    $appeal_id="";
    $crimes_id="";
    $filing_date="";
    $status="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $appeal_id=$_POST["appeal_id"];
        $crimes_id=$_POST["crimes_id"];
        $filing_date=$_POST["filing_date"];
        $status=$_POST["status"];

        do{
            if(empty($appeal_id) || empty($crimes_id) || empty($filing_date) || empty($status)){
                $errorMessage = "All the fields are required";
                break;
            }
        }
        $sql = "INSERT INTO Appeals(Appeal_ID, Crimes_ID, Filling_date, Hearing_date, Status)".
        "VALUES('$appeal_id', '$crimes_id', '$filing_date', '$status')";
        $result = $conn ->query($sql);
        if(!$result){
            $errorMessage = "Invalid query: " . $conn->error;
            break;  
        }

        $appeal_id="";
        $crimes_id="";
        $filing_date="";
        $status="";

        $successMessage = "Client added correctly";
            //redirect to the table once the post request is finished  
            // and exit
        header("location: ../dev_pages/appeals_dev.php");
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
        <h2>New Appeal</h2>
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
                <label class = "col-sm-3 col-form-label" for = "">Appeal ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "appeal_id" value = "<?php echo $appeal_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Crime ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "crimes_id" value = "<?php echo $crimes_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Filing Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "filing_date" value = "<?php echo $filing_date; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Hearing Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "hearing_date" value = "<?php echo $hearing_date; ?>">
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
                    <a class = "btn btn-outline-primary" href="../dev_pages/appeals_dev.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
