<?php
include 'mob_auth_session.php';
if(isset($_POST['but_submit_ethio'])) {
	require '../db.php';
	try {
    		$query = "INSERT INTO `payment` set `full_name`=?, `account_no`=?, `contract_service_no`=?, `addres`=?, `type`=1, `cid`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['cn']);
		$stmt->bindParam(2, $_POST['can']);
		$stmt->bindParam(3, $_POST['sn']);
		$stmt->bindParam(4, $_POST['ad']);
		$stmt->bindParam(5, $_SESSION['cid']);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mob_index'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

   </head>
   <body></br>
	   <a href="mob_index" class="btn-close text-center px-2" aria-label="Close"></a></br>
	   <div class="container">
<div class="table-responsive">
<?php

	require '../db.php';
	require '../config.php';
	try {
    $ty=['','Ethio Telecom','Elpa','Water'];
    $cid=$_SESSION['cid'];
	$query = "SELECT * FROM `payment` WHERE `cid`='".$cid."'";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table class='table table-dark  table-hover'>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<th>Account no</th>";
	echo "<th>Contract or Service no</th>";
	echo "<th>Addres</th>";
	echo "<th>Type</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		 
	echo "<tr>";
	echo "<td>{$full_name}</td>";
	echo "<td>{$account_no}</td>";
	echo "<td>{$contract_service_no}</td>";
	echo "<td>{$addres}</td>";
	echo "<td>{$ty[$type]}</td>";
	echo "</tr>";
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
?>
	</table>
	</div>
	</div>
	
<div class="container">
    <h2 class="text-center"> Ethio Telecom  </h2>
<form method="post" action="">  
	<select name="service" >
		<?php
			$resultSet=$con->query("select * from service");
			while ($rows=$resultSet->fetch_assoc()){
				$id=$rows['id'];
				$name=$rows['name'];
				echo "<option value='$id' >$name</option>";
			}
		?>
	</select>
        <input type="text" class="form-control"  name="can" placeholder="Customer Account No." required></br>
        <input type="text" class="form-control"  name="sn" placeholder="Service No." required></br>
        <input type="text" class="form-control" name="cn"  placeholder="Customer Name" required></br>
        <input type="text" class="form-control"  name="ad" placeholder="Adress" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_ethio" class="btn btn-primary ">Add Payment</button></br>
            </div>
    </form> 
 </div>
 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
