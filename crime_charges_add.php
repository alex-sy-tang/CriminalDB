<?php
    include_once "../connect.php"; 
    $charge_id="";
    $crimes_id="";
    $crime_code="";
    $charge_status="";
    $fine_amount="";
    $court_fee="";
    $amount_paid="";
    $pay_due_date="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $charge_id=$_POST["charge_id"];
        $crimes_id=$_POST["crimes_id"];
        $crime_code=$_POST["crime_code"];
        $charge_status=$_POST["charge_status"];
        $fine_amount=$_POST["fine_amount"];
        $court_fee=$_POST["court_fee"];
        $amount_paid=$_POST["amount_paid"];
        $pay_due_date=$_POST["pay_due_date"];

        do{
            if(empty($charge_id) || empty($crimes_id) || empty($crime_code) || empty($charge_status) || empty($fine_amount) || empty($court_fee) || empty($amount_paid) || empty($pay_due_date){
                $errorMessage = "All the fields are required";
                break;
            }
            $sql = "INSERT INTO Crime_charges(Charge_ID, Crimes_ID, Crime_code, Charge_status, Fine_amount, Court_fee, Amount_paid, Pay_due_date)"."VALUES('$charge_id'. '$crimes_id', '$crime_code', '$charge_status', '$fine_amount', '$court_fee', '$amount_paid', '$pay_due_date')";
            $result = $conn ->query($sql);
            if(!result){
                $errorMessage = "Invalid query: " . $conn->error;
                break;  
            }

            $charge_id="";
            $crimes_id="";
            $crime_code="";
            $charge_status="";
            $fine_amount="";
            $court_fee="";
            $amount_paid="";
            $pay_due_date="";

            $successMessage = "Client added correctly";
            //redirect to the table once the post request is finished  
            // and exit
            header("location: ../dev_pages/crime_charges_dev.php");
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
        <h2>New Crime Charge</h2>

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
                <label class = "col-sm-3 col-form-label" for = "">Charge ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "charge_id" value = "<?php echo $charge_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Crime ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "crimes_id" value = "<?php echo $crimes_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Crime Code</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "crime_code" value = "<?php echo $crime_code; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Charge Status</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "charge_status" value = "<?php echo $charge_status; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Fine Amount</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "fine_amount" value = "<?php echo $fine_amount; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Court Fee</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "court_fee" value = "<?php echo $court_fee; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Amount Paid</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "amount_paid" value = "<?php echo $amount_paid; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Payment Due Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "pay_due_date" value = "<?php echo $pay_due_date; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="../dev_pages/crime_charges_dev.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>