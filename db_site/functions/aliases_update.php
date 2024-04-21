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



$alias_id = "";
$criminal_id = "";
$alias = ""; 

$errorMessage = "";
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["alias_id"])){
        header("location: ../dev_pages/aliases.php");
        exit; 
    }

    $alias_id = $_GET["alias_id"];

    
    

    //read the row of the selcted client from the database
    $sql = "SELECT * FROM Aliases WHERE Alias_ID = $alias_id "; 
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    
    if(!$row){
        header("location: ../dev_pages/aliases.php"); 
        exit; 
    }

    $alias_id = $row["alias_id"]; 
    $criminal_id = $row["criminal_id"]; 
    $alias = $row["alias"]; 



}
else{
    //$criminal_id = $_POST["criminal_id"]; 
    $alias_id = $_POST["alias_id"]; 
    $criminal_id = $_POST["criminal_id"]; 
    $alias = $_POST["alias"]; 

    //echo($alias_id);



        // if(empty($criminal_id) || empty($alias)){
        //     $errorMessage = "All the fileds are required"; 
        //     break; 
        // }

     do{
        if(empty($alias)){

            $errorMessage = "All the fields are required";
            break; 
        }


        $sql = "UPDATE Aliases SET Alias = ? WHERE Alias_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $alias, $alias_id);
        $result = $stmt->execute();

        if(!$result){
            $errorMessage = "Invalid query: ". $conn -> error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location: ../dev_pages/aliases.php"); 
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
        <h2>Update Alias</h2>

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
                    <label class = "col-sm-3 col-form-label" for = "">Alias ID</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-contorl" name = "alias_id" value = "<?php echo $alias_id; ?>">
                    </div>
                </div>

            <input type="hidden" name = "criminal_id" value = "<?php echo $criminal_id; ?>">

            
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Alias</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "alias" value = "<?php echo $alias; ?>">
                </div>
            </div>

            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary"> Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="../dev_pages/aliases.php" role = "button">Cancel</a>
                </div>
            </div>

            
        </form>
    </div>
    
</body>
</html>