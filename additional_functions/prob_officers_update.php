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

 $prob_id="";
  $last_name="";
  $first_name="";
  $street="";
  $city="";
  $state_us="";
  $zip="";
  $phone_number="";
  $email="";
  $status="";

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["prob_id"])){
        header("location: ../dev_pages/probation_officers_dev.php");
        exit; 
    }

    $alias_id = $_GET["prob_id"];

    $sql = "SELECT * FROM Prob_officer WHERE Prob_ID = $prob_id";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();

    if(!$row){
        header("location: ../dev_pages/probation_officers_dev.php"); 
        exit; 
    }
    $prob_id=$row["prob_id"];
    $last_name=$row["last_name"];
    $first_name=$row["first_name"];
    $street=$row["street"];
    $city=$row["city"];
    $state_us=$row["state_us"];
    $zip=$row["zip"];
    $phone_number=$row["phone_number"];
    $email=$row["email"];
    $status=$row["status"];
}else{
  $prob_id=$_POST["prob_id"];
  $last_name=$_POST["last_name"];
  $first_name=$_POST["first_name"];
  $street=$_POST["street"];
  $city=$_POST["city"];
  $state_us=$_POST["state_us"];
  $zip=$_POST["zip"];
  $phone_number=$_POST["phone_number"];
  $email=$_POST["email"];
  $status=$_POST["status"];
  do{
     if(empty($last_name) && empty($first_name) && empty($street) && empty($city) && empty($state_us) && empty($zip) && empty($phone_number) && empty($email) && empty($status)){
              $errorMessage = "At least one the fields is required tp update";
              break; 
      }
      $sql = "UPDATE Prob_Officer SET Last_name = ?, First_name = ?, Street = ?, City = ?, State_US = ?, Zip = ?, Phone_number = ?, Email = ?, Status_ = ? WHERE Prob_ID = ?"
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $last_name, $first_name, $street, $city, $state_us, $zip, $phone_number, $email, $status, $prob_id);
      $result = $stmt->execute();
      if(!$result){
          $errorMessage = "Invalid query: ". $conn -> error;
          break;
      }
      $successMessage = "Client updated correctly";

      header("location: ../dev_pages/probation_officers_dev.php"); 
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
        <h2>Update Probation Officer</h2>

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
                <label class = "col-sm-3 col-form-label" for = "">Probation Officer ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "prob_id" value = "<?php echo $prob_id; ?>">
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
                <label class = "col-sm-3 col-form-label" for = "">State (US)</label>
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
                <label class = "col-sm-3 col-form-label" for = "">Email</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "email" value = "<?php echo $email; ?>">
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
                    <a class = "btn btn-outline-primary" href="../dev_pages/prob_officers_dev.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
