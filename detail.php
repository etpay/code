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
		
		<?php
		if(isset($_GET['uid'])) {
		include "config.php";    
		$cid=$_GET['uid'];
		$sql_query = "select * from partner where cid='".$cid."'";
		$result = mysqli_query($con,$sql_query);
		$row = mysqli_fetch_array($result);
		
		$count = ($row==null) ? 0 : count($row) ;
		
		
		if($count > 0){
		if ($row['type']==1) {
		echo ' <h1>Partner</h1> <div class="card" style="width: 18rem;">
		<ul class="list-group list-group-flush">';
		echo '<li class="list-group-item">Bank ';echo $row['organization'] ;echo '</li>
		<li class="list-group-item">Branch ';echo $row['branch'] ;echo '</li>
		<li class="list-group-item">Account no ';echo $row['oid'] ;echo '</li>
		<li class="list-group-item">Full Name ';echo $row['full_name'] ;echo '</li>
		<li class="list-group-item">Phone number ';echo $row['phone_number'] ;echo '</li>
		</ul>
		</div>';
		} else {
		  echo ' <h1>Partner</h1> <div class="card" style="width: 18rem;">
		<ul class="list-group list-group-flush">';
		echo '<li class="list-group-item">organization ';echo $row['organization'] ;echo '</li>
		<li class="list-group-item">Branch ';echo $row['branch'] ;echo '</li>
		<li class="list-group-item">ID no ';echo $row['oid'] ;echo '</li>
		<li class="list-group-item">Full Name ';echo $row['full_name'] ;echo '</li>
		<li class="list-group-item">Phone number ';echo $row['phone_number'] ;echo '</li>
		</ul>
		</div>';
		}
		
		}else{
		echo '<h3>No partner selected</h3>';}
	
 echo '<div class="table-responsive">
        <h1>Payment</h1>';


	require 'db.php';
	try {
    $ty=['','Ethio Telecom','Elpa','Water'];
    $cid=$_GET['uid'];
	$query = "SELECT * FROM `payment` WHERE `cid`='".$cid."'";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo " <h1>Payment</h1><table class='table table-dark  table-hover'>";
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
}
?>
	</table>
	</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
