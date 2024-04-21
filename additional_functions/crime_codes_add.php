<?php
	 include_once "../connect.php"; 
	 $crime_code="";
	 $code_description="";
	 if($_SERVER['REQUEST_METHOD']=='POST'){
	 	$crime_code=$_POST["crime_code"];
	 	$code_description=$_POST["code_description"];

	 	do{
	 		if(empty($crime_code) || empty($code_description)){
	 			$errorMessage = "All the fields are required";
                break; 
	 		}

	 		$sql = "INSERT INTO Crime_charges(Crime_code, Code_description)"."VALUES('$crime_code', '$code_description')";
	 		$result = $conn ->query($sql);
	 		if(!result){
	 			$errorMessage = "Invalid query: " . $conn->error;
                break; 
	 		}

	 		$crime_code="";
	 		$code_description="";
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
        <h2>New Crime Code</h2>
        <?php
        	if(!empty($errorMessage)){
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
                <label class = "col-sm-3 col-form-label" for = "">Crime Code</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "crime_code" value = "<?php echo $crime_code; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Code Description</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "code_description" value = "<?php echo $code_description; ?>">
                </div>
            </div>
             <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
            	<div class = "col-sm-3 d-grid">
                	<a class = "btn btn-outline-primary" href="../dev_pages/crime_codes_dev.php" role = "button">Cancel</a>
             	</div>
            </div>
        </form>
    </div>
</body>
</html>