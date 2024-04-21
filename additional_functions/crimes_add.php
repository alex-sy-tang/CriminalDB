<?php
    include_once "../connect.php"; 
    $crimes_id="";
    $criminal_id="";
    $classification="";
    $date_charged="";
    $status="";
    $hearing_date="";
    $appeal_cut_date="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $crimes_id=$_POST["crimes_id"];
        $criminal_id=$_POST["criminal_id"];
        $classification=$_POST["classification"];
        $date_charged=$_POST["date_charged"];
        $status=$_POST["status"];
        $hearing_date=$_POST["hearing_date"];
        $appeal_cut_date=$_POST["appeal_cut_date"];

        do{
            if(empty($crimes_id) || empty($criminal_id) || empty($classification) || empty($date_charged) || empty($status) || empty($hearing_date) || empty($appeal_cut_date)){
                    $errorMessage = "All the fields are required";
                    break; 
            }

            $sql = "INSERT INTO Crimes(Crimes_ID, Criminal_ID, Classification, Date_charged, Status, Hearing_date, Appeal_cut_date"."VALUES('$crimes_id', '$criminal_id', '$classification', '$date_charged', '$status', '$hearing_date', '$appeal_cut_date')";
                $result = $conn ->query($sql);
                if(!$result){
                    $errorMessage = "Invalid query: " . $conn ->error;
                    break;
                }
            } 
            $crimes_id="";
            $criminal_id="";
            $classification="";
            $date_charged="";
            $status="";
            $hearing_date="";
            $appeal_cut_date="";

            $successMessage = "Client added correctly";
            //redirect to the table once the post request is finished  
            // and exit
            header("location: ../dev_pages/crimes_dev.php");
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
        <h2>New Crime</h2>

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
                <label class = "col-sm-3 col-form-label" for = "">Crime ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "crimes_id" value = "<?php echo $crimes_id; ?>">
                </div>
            </div>
             <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Criminal ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "criminal_id" value = "<?php echo $criminal_id; ?>">
                </div>
            </div>
              <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Classification</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "classification" value = "<?php echo $classification; ?>">
                </div>
            </div>
              <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Date Charged</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "date_charged" value = "<?php echo $date_charged; ?>">
                </div>
            </div>
              <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Status</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "status" value = "<?php echo $status; ?>">
                </div>
            </div>
              <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Hearing Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "hearing_date" value = "<?php echo $hearing_date; ?>">
                </div>
            </div>
              <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Appeal Cutoff Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "appeal_cut_date" value = "<?php echo $appeal_cut_date; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="../dev_pages/crimes_dev.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

