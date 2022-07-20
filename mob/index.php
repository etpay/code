<?php
include 'auth_session.php';
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

<table class='table table-sm  table-hover'>
	<tr>

        <th >
          <a class="nav-link "  href="account.php">Account</a>
        </th>
        <th >
          <a class="nav-link" href="partner.php">Partner</a>
        </th>
        <th >
          <a class="nav-link " href="payment.php">Payment</a>
        </th> 
		<th >
          <a class="nav-link" href="coment.php">Comment</a>
        </th>
	      <th >
          <a class="nav-link " href="logout.php">Log out</a>
        </th>
</tr>
  

	<div class="table-responsive">

<?php
 
	require '../db/db.php';
	try {
$cid=$_SESSION['cid'];
	$query = "SELECT * FROM commit where uid='".$cid."'";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table class='table table-dark  table-hover'>";
	echo "<tr>";
	echo "<th>cu_id</th>";
	echo "<th>name</th>";
	echo "<th>partner</th>";
	echo "<th>electric</th>";
	
	echo "<th>Day left</th>";
	echo "<th>telecom</th>";
	echo "<th>Day left</th>";
	echo "<th>water</th>";
	echo "<th>Day left</th>";
	echo "<th>total</th>";
	
	echo "<th>New Month Payment</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		 $elec = new DateTime($edeadline);
		 $tel = new DateTime($tdeadline);
		 $wat = new DateTime($wdeadline);
        
        $now = new DateTime();
         
        // $difference = $now->diff($dob);
        $eday = $now->diff($elec)->format("%r%a");
        $tday = $now->diff($tel)->format("%r%a");
        $wday = $now->diff($wat)->format("%r%a");
         
        // $day = $difference->d;
	echo "<tr>";
	echo "<td>{$cu_id}</td>";
	echo "<td>{$name}</td>";
	echo "<td>{$partner}</td>";
	echo "<td>{$electric}</td>";
	echo "<td>{$eday}</td>";
	echo "<td>{$telecom}</td>";
	echo "<td>{$tday}</td>";
	echo "<td>{$water}</td>";
	echo "<td>{$wday}</td>";
	$total = ($row['electric'] + $row['telecom'] + $row['water']) ;
	echo "<td>{$total}</td>";
	echo "<td><a href='edit.php?cu_id={$cu_id}'>New Month</a> </td>";
	


	echo "</tr>";
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
?>
	</table>
	</div>
	
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
