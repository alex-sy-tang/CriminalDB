<?php 

session_start();
include "../connect.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login page
  header('Location: ../login.html');
  exit;
}

?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "../styles/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    
    	<div class="search-bar">
			<form action="../table_pages/aliases.php" method = "GET">
        		<input type="text" name = "search_by_id" placeholder="Enter ID">
				<button type = "submit">Search</button>
      		</form>
    	</div>
    	<ul>
   			<li><a href="../login.html" class="login">Logout</a ></li>
     	</ul>
		<ul>
			<li><a href="../table_pages/aliases.php" class="login">Back</a ></li>
		</ul>
	 </nav>
	<div id="table_content" class = "container my5">
		<div class="table header">
			<h1>Aliases</h1>
		</div>
		<div class = "table holder">
			<table class = "table">
        		<tr>
        			<th>Alias ID</th>
        			<th>Criminal ID</th>
        			<th>Alias</th>
        		</tr>
        		<?php
                    include_once "../connect.php"; 
                    mysqli_query($conn, "LOCK TABLES Aliases READ");
                    // if(isset($_POST['search_by_id'])){
                    //     $id = $_POST['get_id'];
                    //     $query = "SELECT * FROM employee WHERE id='$id' "; 

                    // }
                   

                    $sql = "SELECT * FROM Aliases";
                    $param = [];
                    $types = '';

                    if($_SERVER["REQUEST_METHOD"] == "GET"){
                        if(!empty($_GET["search_by_id"])){
                            $sql .= " WHERE Alias_ID = ?";
                            $params[] = $_GET['search_by_id'];
                            $types .= 'i'; 
                        }
                    }
                    

                    $stmt = $conn -> prepare($sql);

                    if($params){
                        $stmt -> bind_param($types, ...$params); 
                    }

                    $stmt -> execute();
                    $result = $stmt -> get_result(); 
                    // if(isset($_POST['search'])){
                    //     $id = $_POST['search_by_id']; 
                    //     $sql = " SELECT * FROM Aliases WHERE Alias_ID = $id ";  
                    // }


                    //$result = $conn -> query($sql); 

                    if(!$result){
                        die("Invalid query: " . $conn -> error); 
                    }

                    while($row = $result -> fetch_assoc()){
                        echo"
                        <tr>
                            <td>$row[Alias_ID]</td>
                            <td>$row[Criminal_ID]</td>
							<td>$row[Alias]</td>
                           
                        </tr>
                        ";
                    }

                    mysql_query($conn, "UNLOCK TABLES");
					$conn->close();
					

                    ?>
			</table>
		</div>
	</div>
</body>
</html>
