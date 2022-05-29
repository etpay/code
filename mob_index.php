<?php
include 'mob_auth_session.php';
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

<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Collapsed content</h5>
	<ul class="navbar-nav ">

        <li class="nav-item ">
          <a class="nav-link  text-white"  href="#">Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="mob_partner.php">Partner</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link  text-white" href="mob_payment.php">Payment</a>
        </li> 
		<li class="nav-item ">
          <a class="nav-link text-white" href="mob_coment.php">Comment</a>
        </li>
	      <li class="nav-item ">
          <a class="nav-link  text-white" href="mob_logout.php">Log out</a>
        </li>
     </ul>
    <span class="text-muted">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

	<!-- <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
</a>
    <a class="navbar-brand" href="mob_coment.php">Comment</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mob_partner.php">Partner</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="mob_payment.php">Payment</a>
        </li>
	      <li class="nav-item">
          <a class="nav-link " href="mob_logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->
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
	</table>
	</div>
	
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
