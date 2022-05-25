<?php
include 'auth_session.php';
?>

<html>
<body>


	<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="mobcoment.php">Comment</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mobpartner.php">Partner</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="mobpayment.php">Payment</a>
        </li>
	      <li class="nav-item">
          <a class="nav-link disabled" href="moblogout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<div class="table-responsive">

<?php
 
	require 'db.php';
	try {
	$query = "SELECT * FROM commit";
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
	</table> </br>
	</div>
	
</body>

</html>
