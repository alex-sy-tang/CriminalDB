<?php
    include_once "../connect.php"; 
    $alias_id = "";
    $criminal_id = "";
    $alias = "";

    $errorMessage = "";
    $successMessage = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $alias_id = $_POST["alias_id"];
        $criminal_id = $_POST["criminal_id"];
        $alias = $_POST["alias"];

        do{
            //if any of the input field is empty, 
            //return an error message and break out of the loop
            if(empty($alias_id) || empty($criminal_id) || empty($alias)){
                $errorMessage = "All the fields are required";
                break; 
            } 
            //add new client to database
            $sql = "INSERT INTO Aliases(Alias_ID, Criminal_ID, Alias)".
            "VALUES('$alias_id','$criminal_id','$alias')"; 

            $result = $conn -> query($sql);

            //if can't get query result, report error and break
            if(!$result){
                $errorMessage = "Invalid query: " . $conn->error;
                break;  
            }

            $alias_id = "";
            $criminal_id = "";
            $alias = "";

            $successMessage = "Client added correctly";

            //redirect to the table once the post request is finished  
            // and exit
            header("location: ../dev_pages/aliases.php");
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
    <script src = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class = "container my-5">
        <h2>New Alias</h2>

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

            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label" for = "">Criminal ID</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-contorl" name = "criminal_id" value = "<?php echo $criminal_id; ?>">
                </div>
            </div>

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