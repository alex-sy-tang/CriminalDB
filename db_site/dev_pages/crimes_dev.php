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
      		<form action="../functions/track_criminals_by_crime.php" method = "GET">
        		<input type="text" name = "search_query" placeholder="Search Criminal">
				<button type = "submit">Search</button>
      		</form>
    	</div>



    	<div class="search-bar">
      		<form action="crimes_dev.php" method = "GET">
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
			<li><a href="../dev_pages/crimes_dev.php" class="login">Return</a></li>
    	</ul>
	 </nav>
	<div id="table_content" class = "container my5">
		<div class="table header">
			<h1>Crimes</h1>
		</div>
		<div class = "table holder">
			<table class="table">
				<tr>
					<th>Crime ID</th>
					<th>Criminal ID </th>
					<th>Classification </th>
					<th>Date Charged</th>
					<th>Charge Status</th>
					<th>Hearing Date</th>
					<th>Appeal Cutoff Date</th>
				</tr>
				<?php
					
						include '../connect.php';
						mysqli_query($conn, "LOCK TABLES Crimes READ");

						$sql = "SELECT * FROM Crimes"; 
						$params = [];
						$types = '';

						if($_SERVER["REQUEST_METHOD"] == "GET"){
							if(!empty($_GET['search_by_id'])){
								$sql .= " WHERE Crimes_ID = ?"; 
								$params[] = $_GET['search_by_id'];
								$types .= 'i'; 
							}
						}

						$stmt = $conn -> prepare($sql);
						if($params){
							$stmt -> bind_param($types, ...$params);
						}

						$stmt->execute();
						$result = $stmt->get_result(); 

						if(!$result){
							die("Invalid query: " . $conn -> error); 
						}

						
					while($rows = $result->fetch_assoc()){
						echo"<tr>
							<td>".$rows["Crimes_ID"]."</td>
							<td>".$rows["Criminal_ID"]."</td>
							<td>".$rows["Classification"]."</td>
							<td>".$rows["Date_charged"]."</td>
							<td>".$rows["Status_"]."</td>
							<td>".$rows["Hearing_date"]."</td>
							<td>".$rows["Appeal_cut_date"]."</td>
						</tr>";
							
						
						}

					mysqli_query($conn, "UNLOCK TABLES");		
					$conn->close();
					?>
			</table>
		</div>
	</div>
</body>
</html>