<?php
include "../connect.php";

$sql = " SELECT * FROM Crime_officers ";
$result = $conn->query($sql);
$conn->close();
?>

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
	<link rel = "stylesheet" href = "../styles/style.css">
	<style>
    h1 {
	text-align: left;
	color: black;
	vertical-align: center;
	margin-left: 20px;
	font-size: 30px;
}
nav {
  background-color: #3a3a3a;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.7% 21%;
  font-family: "Helvetica";
 }
    
body {
	margin: 0px;
}

.logo h1 {
  margin: 0;
  font-weight: bold;
  color: #FFFFFF;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  display: inline-block;
  margin-left: 20px;
  
}

a {
  text-decoration: none;
}

.search-bar {
  display: flex;
  align-items: center;
}

.login {
  color: #FF9051;
}

.search-bar form {
  position: relative;
}

.search-bar input[type="text"] {
  padding: 5px 10px;
  border: 0px;
  border-radius: 5px;
  font-size: 16px;
  background-color: #4f4f4f
}

#Header {
	background-color: grey;
	height: 10vh;
	vertical-align: top;
	padding-top: 0px;
	padding-bottom: 0px;
	border-top: 0px;
}
#Content {
	vertical-align: top;
	padding: 10vw;
	border-top: 0px;
}
.buttons a {
        padding: 13px 20px;
        width: 20%;
        border-radius: 8px;
        text-align: center;
        margin-left: 500px;
        background-color: #EDEDED;
        margin-bottom: 10px;
}

    </style>
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
	<div id="table_content">
		<div class="table_header">
			<h1>Aliases</h1>
		</div>
        <h3>Add a new Alias:</h3>
        <form action="/insert.php">
  <label for="alias_id">Alias ID:</label>
  <input type="text" id="alias_id" name="alias_id"><br><br>
  <label for="criminal_id">Criminal ID:</label>
  <input type="text" id="criminal_id" name="criminal_id"><br><br>
  <label for="alias">Alias:</label>
  <input type="text" id="alias" name="alias"><br><br>
  <input type="submit" style='color: black; padding: 11px 27px; border-radius: 8px; text-align: center;
background-color: #EDEDED' value="Submit">
<br>
<br>
</form>
		<div class = "table_holder">
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