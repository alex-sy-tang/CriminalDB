<?php

session_start();
include "../connect.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login page
  header('Location: login.html');
  exit;
}

$sql = " SELECT * FROM Sentencing ";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "../styles/style.css">
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    	<ul>
			<li><a href="../logout.php" class="login">Logout</a></li>

	</ul>
	 </nav>
	<div class="table_content">
		<div class="table header">
			<h1>Sentences</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<tr>
					<th>Sentencing ID</th>
					<th>Crime ID</th>
					<th>Sentence Type</th>
					<th>Probation ID</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Number of Violations</th>
				</tr>
				<?php
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Sentencing_ID'];?></td>
						<td><?php echo $rows['Crimes_ID'];?></td>
						<td><?php echo $rows['Sentence_type'];?></td>
						<td><?php echo $rows['Prob_ID'];?></td>
						<td><?php echo $rows['Start_date'];?></td>
						<td><?php echo $rows['End_date'];?></td>
						<td><?php echo $rows['Number_of_violations'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>