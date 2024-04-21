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
	<link rel="stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<script src = "ps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>pt>
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    
    	<div class="search-bar">
      		<form action="../functions/criminal_totalcharge.php" method = "GET">
        		<input type="text" name = "search_by_id" placeholder="Criminal Charge">
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
			<li><a href="../dev_pages/criminals.php" class="login">Return</a></li>
    	</ul>
	 </nav>
	<div id="table_content" class = "container my5">
		<!--<div class="table header"> -->
			<h1>Criminals</h1>
		<!--</div>-->
		<a class = "btn btn-primary" href ="..//functions/criminal_add.php" role = "button"> Add </a>
		<div class = "table holder">
			<table class="table">
				<thead>
					<tr>
						<th>Criminal ID</th>
						<th>Last Name </th>
						<th> First Name </th>
						<th>Street</th>
						<th>City</th>
						<th>State</th>
						<th>Zip Code</th>
						<th>Phone Number</th>
						<th>Violent Offender Status</th>
						<th>Probation Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include_once '../connect.php';
						mysqli_query($conn, "LOCK TABLES Criminals READ");
						$sql = "SELECT * FROM Criminals"; 
						$params = [];
						$types = '';

						if($_SERVER["REQUEST_METHOD"] == "GET"){
							if(!empty($_GET["search_by_id"])){
								$sql .= "WHERE Alias_ID = ?";
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

						if (!$result){
							die("Invalid query: " . $conn -> error);
						}
						while ($row = $result -> fetch_assoc()){
							echo"
							<tr>
								<td>".$row["Criminal_ID"]."</td>
									<td>".$row["Last"]."</td>
									<td>".$row["First"]."</td>
                                    <td>".$row["Street"]."</td>
                                    <td>".$row["City"]."</td>
                                    <td>".$row["State"]."</td>
                                    <td>".$row["Zip"]."</td>
                                    <td>".$row["Phone"]."</td>
                                    <td>".$row["V_status"]."</td>
                                    <td>".$row["P_status"]."</td>
									<td>
											<a class = 'btn btn-primary' href='../functions/criminal_update.php?id=$row[Criminal_ID]'>Update</a>
											<a class = 'btn btn-danger' href='../functions/criminal_delete.php?id=$row[Criminal_ID]'>Delete</a>
									</td>
                            </tr>
                            ";

						}

						mysql_query($conn, "UNLOCK TABLES");
						$conn->close();

						?>
					</tbody>
				</table>
<!-- 						$params = [];
						$types = '';

						if($_SERVER["REQUEST_METHOD"] == "GET"){
							if(!empty($_GET['search_criminal_id'])){
								$sql .= " WHERE Criminal_ID = ?"; 
								$params[] = $_GET['search_criminal_id'];
								$types .= 'i'; 
							}
						}

						$stmt = $conn -> prepare($sql);
						if($params){
							$stmt -> bind_param($types, ...$params);
						}

						$stmt->execute();
						$result = $stmt->get_result(); 

						if($result->num_rows > 0){
							while($rows = $result->fetch_assoc()){
								echo"<tr>
									<td>".$rows["Criminal_ID"]."</td>
									<td>".$rows["Last"]."</td>
									<td>".$rows["First"]."</td>
                                    <td>".$rows["Street"]."</td>
                                    <td>".$rows["City"]."</td>
                                    <td>".$rows["State"]."</td>
                                    <td>".$rows["Zip"]."</td>
                                    <td>".$rows["Phone"]."</td>
                                    <td>".$rows["V_status"]."</td>
                                    <td>".$rows["P_status"]."</td>
								</tr>";
							}
						mysqli_query($conn, "UNLOCK TABLES");
						}else{
							mysqli_query($conn, "UNLOCK TABLES");
							echo"<tr><td colspan = '3'>No results found</td></tr>";
						}
					$conn->close();
					?> -->

		</div>
	</div>
</body>
</html>
