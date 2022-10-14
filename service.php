<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-WebKit-CSP" content="default-src 'self'; script-src 'self'">

	</head>
	<body>
<?php
if(isset($_POST['submit_btn'])) {
	// 
// (B) CHECK IF TOKEN IS SET
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
  exit("Token is not set!");
}
 
// (C) COUNTER CHECK SUBMITTED TOKEN AGAINST SESSION
if ($_SESSION["token"]==$_POST["token"]) {
  // (C1) EXPIRED
  if (time() >= $_SESSION["token-expire"]) {
    exit("Token expired. Please reload form.");
  }
  // (C2) OK - DO YOUR PROCESSING
  else {
    unset($_SESSION["token"]);
    unset($_SESSION["token-expire"]);
    echo "OK";
  }
}

// (D) INVALID TOKEN
else { exit("INVALID TOKEN"); }
// 
// 
	require 'db/db.php';
	require 'db/config.php';
	try {
		$name =mysqli_real_escape_string($con, $_POST['name']);
		$sql = "INSERT INTO service SET name=$name";
		if ($con->query($sql) === TRUE) {
			echo "<script>alert('New service Saved.');location.href='admin.php'</script>";
		} else {
			echo "Error:<br>" . $conn->error;
		}

		// $query = "INSERT INTO service SET name=?";
		// $stmt = $dbc->prepare($query);
		// $stmt->bindParam(1, $_POST['name']);
		// if($stmt->execute()) {
		// 	echo "<script>alert('New Service Saved.');location.href='admin.php'</script>";
		// } else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
		// 
// 
$_SESSION["token"] = bin2hex(random_bytes(32));
$_SESSION["token-expire"] = time() + 1800; // 1 hour = 3600 secs
// 
// 
?>
	
<div class="container">
    <form  autocomplete="off"  class="form" action="" method="POST">
	      <!--  -->
            <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
            <!--  -->
        <div class="form-group">
            <input  class="form-control" type="text" name="name" placeholder="Name" required/> 
        </div>
			</br>
        <div class="form-group">
            <input class="form-control"type="submit" name="submit_btn"/>
        </div></br>
    </form>   
    <?php

	require 'db/db.php';
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
