<?php

$user = 'root';
$password = '';

$database = 'jail';

$servername = 'localhost:80';
$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli -> connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM Crime_charges ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "styles/style.css">
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    	<ul>
     		 <li><a href="../login.html" class="login">Login</a></li>
    	</ul>
	 </nav>
	<div class="table_content">
		<div class="table header">
			<h1>Crime Charges</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
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
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Charge_ID'];?></td>
						<td><?php echo $rows['Crimes_ID'];?></td>
						<td><?php echo $rows['Crime_code'];?></td>
						<td><?php echo $rows['Charge_status'];?></td>
						<td><?php echo $rows['Fine_amount'];?></td>
						<td><?php echo $rows['Court_fee'];?></td>
						<td><?php echo $rows['Amount_paid'];?></td>
						<td><?php echo $rows['Pay_due_date'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
