
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
    	<ul>
     		 <li><a href="../login.html" class="login">Login</a></li>
    	</ul>
	 </nav>
	 
        </div>


	<div id="table_content" class = "container my5">
		<!-- <div class="table header"> -->
		<h2>Aliases</h2>
        <a class = "btn btn-primary" href="../functions/aliases_add.php" role = "button">Add</a>
		<!-- </div> -->
		<div class = "table holder">
			<table class = "table">
                <thead>
                    <tr>
                        <th>Alias ID</th>
                        <th>Criminal ID</th>
                        <th>Alias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../connect.php"; 
                    $sql = "SELECT * FROM Aliases";
                    $result = $conn -> query($sql); 

                    if(!$result){
                        die("Invalid query: " . $conn -> error); 
                    }

                    while($row = $result -> fetch_assoc()){
                        echo"
                        <tr>
                            <td>$row[Alias_ID]</td>
                            <td>$row[Criminal_ID]</td>
                            <td>$row[Alias]</td>
                            <td>
                            <a class = 'btn btn-primary' href='../functions/aliases_update.php?id=$row[Alias_ID]'>Update</a>
                            <a class = 'btn btn-danger' href='../functions/aliases_delete.php?id=$row[Alias_ID]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }

                    ?>
                </tbody>
        		
        		
			</table>
		</div>
	</div>
</body>
</html>
