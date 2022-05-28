<?php
include 'mob_auth_session.php';
if(isset($_POST['but_submit_ethio'])) {
	require 'db.php';
	try {
    		$query = "INSERT INTO `payment` set `full_name`=?, `account_no`=?, `contract_service_no`=?, `addres`=?, `type`=1, `cid`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['cn']);
		$stmt->bindParam(2, $_POST['can']);
		$stmt->bindParam(3, $_POST['sn']);
		$stmt->bindParam(4, $_POST['ad']);
		$stmt->bindParam(5, $_SESSION['cid']);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mob_index.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
if(isset($_POST['but_submit_elpa'])) {
	require 'db.php';
	try {
		$query = "INSERT INTO `payment` set `full_name`=?, `account_no`=?, `contract_service_no`=?, `addres`=?, `type`=2, `cid`=?";
			
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['ecn']);
		$stmt->bindParam(2, $_POST['ck']);
		$stmt->bindParam(3, $_POST['cno']);
		$stmt->bindParam(4, $_POST['ead']);
		$stmt->bindParam(5, $_SESSION['cid']);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mob_index.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
if(isset($_POST['but_submit_water'])) {
	require 'db.php';
	try {
    		$query = "INSERT INTO `payment` set `full_name`=?, `account_no`=?, `contract_service_no`=?, `addres`=?, `type`=?, `cid`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['wcn']);
		$stmt->bindParam(2, $_POST['wck']);
		$stmt->bindParam(3, $_POST['wcno']);
		$stmt->bindParam(4, $_POST['wad']);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mob_index.php'</script>";
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
   <body>
	   <a href="mob_index.php" class="btn-close" aria-label="Close"></a>
<div class="table-responsive">
<?php

	require 'db.php';
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
	
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Ethio Telecom
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<form method="post" action="">  
        <input type="text" class="form-control"  name="can" placeholder="Customer Account No." required></br>
        <input type="text" class="form-control"  name="sn" placeholder="Service No." required></br>
        <input type="text" class="form-control" name="cn"  placeholder="Customer Name" required></br>
        <input type="text" class="form-control"  name="ad" placeholder="Adress" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_ethio" class="btn btn-primary ">Add Payment</button></br>
            </div>
    </form>       </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       Elpa
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<form method="post" action="">  
        <input type="text" class="form-control"  name="ck" placeholder="Customer Key" required></br>
        <input type="text" class="form-control" name="ecn"  placeholder="Customer Name" required></br>
        <input type="text" class="form-control"  name="cno" placeholder="Contract No" required></br>
        <input type="text" class="form-control"  name="ead" placeholder="Adress" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_elpa" class="btn btn-primary ">Add Payment</button></br>
            </div>
    </form>       </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Water
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<form method="post" action="">  
     <input type="text" class="form-control"  name="wck" placeholder="Customer Key" required></br>
        <input type="text" class="form-control" name="wcn"  placeholder="Customer Name" required></br>
        <input type="text" class="form-control"  name="wcno" placeholder="Contract No" required></br>
        <input type="text" class="form-control"  name="wad" placeholder="Adress" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_water" class="btn btn-primary ">Add Payment</button></br>
            </div>
    </form>       </div>
    </div>
  </div>
</div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
