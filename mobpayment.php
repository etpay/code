<?php
if(isset($_POST['but_submit_ethio'])) {
	require 'db.php';
	try {
		$query = "INSERT INTO `ethiotelecom` SET  `customer_key`=?, `service_no`=?, `customer_name`=?, `addres`=?, `uid`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['can']);
		$stmt->bindParam(2, $_POST['sn']);
		$stmt->bindParam(3, $_POST['cn']);
		$stmt->bindParam(4, $_POST['ad']);
		$stmt->bindParam(5, 1);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mobindex.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
if(isset($_POST['but_submit_elpa'])) {
	require 'db.php';
	try {
		$query = "INSERT INTO `elpa`SET  `customer_key`=?, `reading_no`=?, `customer_name`=?, `contract_no`=?, `block`=?, `ordinal`=?, `book`=?, `uid`=?";
			
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['ck']);
		$stmt->bindParam(2, $_POST['rn']);
		$stmt->bindParam(3, $_POST['ecn']);
		$stmt->bindParam(4, $_POST['bl']);
		$stmt->bindParam(5, $_POST['or']);
		$stmt->bindParam(6, $_POST['bo']);
		$stmt->bindParam(7, 1);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mobindex.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
if(isset($_POST['but_submit_water'])) {
	require 'db.php';
	try {
		$query = "INSERT INTO `warer` SET  `customer_key`=?, `reading_no`=?, `customer_name`=?, `contract_no`=?, `block`=?, `ordinal`=?, `book`=?, `uid`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['wck']);
		$stmt->bindParam(2, $_POST['wrn']);
		$stmt->bindParam(3, $_POST['wcn']);
		$stmt->bindParam(4, $_POST['wbl']);
		$stmt->bindParam(5, $_POST['wor']);
		$stmt->bindParam(6, $_POST['wbo']);
		$stmt->bindParam(7, 1);
		if($stmt->execute()) {
			echo "<script>alert('Payment Registered.');location.href='mobindex.php'</script>";
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
        <input type="text" class="form-control"  name="rn" placeholder="Reading No" required></br>
        <input type="password" class="form-control" name="ecn"  placeholder="Customer Name" required></br>
        <input type="text" class="form-control"  name="bl" placeholder="Block" required></br>
        <input type="email" class="form-control"  name="or" placeholder="Ordinal" required></br>
        <input type="text" class="form-control"  name="bo" placeholder="Book" required></br>
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
        <input type="text" class="form-control"  name="wrn" placeholder="Reading No" required></br>
        <input type="password" class="form-control" name="wcn"  placeholder="Customer Name" required></br>
        <input type="text" class="form-control"  name="wbl" placeholder="Block" required></br>
        <input type="email" class="form-control"  name="wor" placeholder="Ordinal" required></br>
        <input type="text" class="form-control"  name="wbo" placeholder="Book" required></br>
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
