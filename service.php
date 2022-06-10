<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
<?php
if(isset($_POST['submit_btn'])) {
	require 'db.php';
	try {
		$query = "INSERT INTO service SET name=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['name']);
		if($stmt->execute()) {
			echo "<script>alert('New Service Saved.');location.href='Admin'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
?>
	
<div class="container">
    <form class="form" action="" method="POST">
        <div class="form-group">
            <input  class="form-control" type="text" name="name" placeholder="Name" required/> 
        </div>
			</br>
        <div class="form-group">
            <input class="form-control"type="submit" name="submit_btn"/>
        </div></br>
    </form>   
    <?php

	require 'db.php';
	try {
	$query = "SELECT * FROM service";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table class='table  table-hover'>";
	echo "<tr>";
	echo "<th>Id</th>";
	echo "<th>Name</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$id}</td>";
	echo "<td>{$name}</td>";
	echo "</tr>";
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
?>
</div>

	</body>
</html>
