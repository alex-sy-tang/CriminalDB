
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
      		<form action="../functions/track_criminals_by_officers.php" method = "GET">
        		<input type="text" name = "search_query" placeholder="Search Criminal">
				<button type = "submit">Search</button>
      		</form>
    	</div>
    
    	<div class="search-bar">
      		<form action="officers_dev.php" method = "GET">
        		<input type="text" name = "search_by_id" placeholder="Enter ID">
                <button type = "submit">Search</button>
      		</form>
    	</div>
    	<ul>
			<li><a href="../logout.php" class="login">Logout</a></li>
    	</ul>
        <ul>
			<li><a href="../buttons_developer.php" class="login">Back</a></li>
        </ul>
        <ul>
			<li><a href="../dev_pages/officers_dev.php" class="login">Return</a></li>
    	</ul>
	 </nav>
	 
        </div>


	<div id="table_content" class = "container my5">
		<!-- <div class="table header"> -->
		<h2>Officers</h2>
    <!-- ADD Function ***To Do <a class = "btn btn-primary" href="../functions/aliases_add.php" role = "button">Add</a> -->
		<!-- </div> -->
		<div class = "table holder">
			<table class = "table">
                <thead>
                    <tr>
                        <th>Officer ID</th>
                        <th>Last name</th>
                        <th>First name</th>
						<th>Precinct</th>
                        <th>Badge</th>
                        <th>Phone</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../connect.php"; 
                    mysqli_query($conn, "LOCK TABLES Officers READ");
                    // if(isset($_POST['search_by_id'])){
                    //     $id = $_POST['get_id'];
                    //     $query = "SELECT * FROM employee WHERE id='$id' "; 

                    // }
                   

                    $sql = "SELECT * FROM Officers";
                    $params = [];
                    $types = '';

                    if($_SERVER["REQUEST_METHOD"] == "GET"){
                        if(!empty($_GET["search_by_id"])){
                            $sql .= " WHERE Officer_ID = ?";
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
                            <td>$row[Officer_ID]</td>
                            <td>$row[Last_name]</td>
                            <td>$row[First_name]</td>
							<td>$row[Precinct]</td>
                            <td>$row[Badge]</td>
                            <td>$row[Phone]</td>
                            <td>$row[Status_]</td>


                        </tr>
                        ";
                    }

                    mysql_query($conn, "UNLOCK TABLES");
					$conn->close();
					

                    ?>
                </tbody>
        		
        		
			</table>
		</div>
	</div>
</body>
</html>
