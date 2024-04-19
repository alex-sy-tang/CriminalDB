<?php

$user = 'root';
$password = '';

$database = 'jail';

$servername = 'localhost:80';
$mysqli = new mysqli($serverame, $user, $password, $database);

if ($mysqli -> connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM Aliases ";
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
    
    	<div class="search-bar">
      		<form action="#">
        		<input type="text" placeholder="Search">
      		</form>
    	</div>
    	<ul>
     		 <li><a href="#" class="login">Login</a></li>
    	</ul>
	 </nav>
	<div id="table_content">
		<div class="table header">
			<h1>Aliases</h1>
		</div>
		<div class = "table holder">
			<table class = "full_table">
        		<tr>
        			<th>Alias ID</th>
        			<th>Criminal ID</th>
        			<th>Alias</th>
        		</tr>
        		<?php
        			while($rows=$result->fetch_assoc()){
        		?>
        		<tr>
        			<td><?php echo $rows['Alias_ID'];?></td>
        			<td><?php echo $rows['Criminal_ID'];?></td>
        			<td><?php echo $rows['Alias'];?></td>
        		</tr>
        		<?php
        			}
        		?>
			</table>
		</div>
	</div>
</body>
</html>
