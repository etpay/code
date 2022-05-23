<?php
include 'auth_session.php';
?>

<html>
<body>
</br>
<a href="mobcoment.php">Comment</a> </br>
<?php
 
	require 'db.php';
	try {
	$query = "SELECT * FROM commit";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5'>";
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
	
</body>

</html>