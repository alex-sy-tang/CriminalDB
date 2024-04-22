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

$sentence_id="";
$crimes_id="";
$sentence_type="";
$prob_id="";
$start_date="";
$end_date="";
$number_of_violations="";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["sentence_id"])){
        header("location: ../dev_pages/sentences_dev.php");
        exit; 
    }

    $alias_id = $_GET["sentence_id"];

    $sql = "SELECT * FROM Sentencing WHERE Sentencing_ID = $sentence_id "; 
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    if(!$row){
      header("location: ../dev_pages/sentences_update.php"); 
      exit; 
    }
    $sentence_id=$row["sentence_id"];
    $crimes_id=$row["crimes_id"];
    $sentence_type=$row"sentence_type"];
    $prob_id=$row["prob_id"];
    $start_date=$row["start_date"];
    $end_date=$row["end_date"];
    $number_of_violations=$row["number_of_violations"];
}else{
    $sentence_id=$_POST["sentence_id"];
    $crimes_id=$_POST["crimes_id"];
    $sentence_type=$_POST["sentence_type"];
    $prob_id=$_POST["prob_id"];
    $start_date=$_POST["start_date"];
    $end_date=$_POST["end_date"];
    $number_of_violations=$_POST["number_of_violations"];

    do{
      if(empty($sentence_type) && empty($start_date) && empty($end_date) && empty($number_of_violations)){
        $errorMessage = "All the fields are required";
        break; 
        }
      $sql = "UPDATE Sentencing SET Sentence_type = ?, Start_date = ?, End_date = ?, Number_of_violations = ? WHERE Sentencing_ID=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sssssssssi", $sentence_type, $start_date, $end_date, $number_of_violations, $sentence_id);
      $result = $stmt->execute(); 
      if(!$result){
          $errorMessage = "Invalid query: ". $conn -> error;
          break;
      }

      $successMessage = "Client updated correctly";

      header("location: ../dev_pages/sentences_dev.php"); 
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
        <h2>New Sentence</h2>

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
                <label class = "col-sm-3 col-form-label" for = "">Sentence ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "sentence_id" value = "<?php echo $sentence_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Crime ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "crimes_id" value = "<?php echo $crimes_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Sentence Type</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "sentence_type" value = "<?php echo $sentence_type; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Probation ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "prob_id" value = "<?php echo $prob_id; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Start Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "start_date" value = "<?php echo $start_date; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">End Date</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "end_date" value = "<?php echo $end_date; ?>">
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Number of Violations</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "number_of_violations" value = "<?php echo $number_of_violations; ?>">
                </div>
            </div>
             <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="../dev_pages/sentences_dev.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
