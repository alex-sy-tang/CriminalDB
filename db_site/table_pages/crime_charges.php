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
			<form action="../table_pages/crime_charges.php" method = "GET">
        		<input type="text" name = "search_by_id" placeholder="Enter ID">
				<button type = "submit">Search</button>
      		</form>
    	</div>
    	<ul>
   			<li><a href="../login.html" class="login">Logout</a ></li>
     	</ul>
    	<ul>
			<li><a href="../buttons_users.php" class="login">Back</a></li>
        </ul>

		<ul>
			<li><a href="../table_pages/appeals.php" class="login">Return</a ></li>
		</ul>
	 </nav>
	<div id="table_content" class = "container my5">
		<div class="table header">
			<h1>Crime Charges</h1>
		</div>
		<div class = "table holder">
			<table class="table">
				<tr>
					<th>Charge ID</th>
					<th>Crime ID </th>
					<th> Crime Code</th>
					<th>Charge Status</th>
					<th>Fine Amount</th>
					<th>Court Fee</th>
					<th>Amount Paid</th>
					<th>Payment Due Date</th>
				</tr>
				<?php
                    include_once "../connect.php"; 
                    mysqli_query($conn, "LOCK TABLES Crime_charges READ");
                    // if(isset($_POST['search_by_id'])){
                    //     $id = $_POST['get_id'];
                    //     $query = "SELECT * FROM employee WHERE id='$id' "; 

                    // }
                   

                    $sql = "SELECT * FROM Crime_charges";
                    $param = [];
                    $types = '';

                    if($_SERVER["REQUEST_METHOD"] == "GET"){
                        if(!empty($_GET["search_by_id"])){
                            $sql .= " WHERE Charge_ID = ?";
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
                            <td>$row[Charge_ID]</td>
                            <td>$row[Crimes_ID]</td>
							<td>$row[Crime_code]</td>
                            <td>$row[Charge_status]</td>
							<td>$row[Fine_amount]</td>
                            <td>$row[Court_fee]</td>
							<td>$row[Amount_paid]</td>
                            <td>$row[Pay_due_date]</td>
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