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
		$query = "INSERT INTO commit SET name=?, partner=?, electric=?,edeadline=?, telecom=?, tdeadline=?, water=?, wdeadline=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['fname']);
		$stmt->bindParam(2, $_POST['ppartner']);
		$stmt->bindParam(3, $_POST['eelectric']);
		$stmt->bindParam(4, $_POST['edeadline']);
		$stmt->bindParam(5, $_POST['ttelecom']);
		$stmt->bindParam(6, $_POST['tdeadline']);
		$stmt->bindParam(7, $_POST['wwater']);
		$stmt->bindParam(8, $_POST['wdeadline']);
		if($stmt->execute()) {
			echo "<script>alert('New Payment Saved.');location.href='index.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
?>

		<form action="" method="POST">
			Full Name: <input type="text" name="fname" required/> </br>
			</br>
			partner: <input type="text" name="ppartner" required/> </br>
			</br>
			electric: <input type="text" name="eelectric" /> </br>

			</br>
			deadline: <input type="date" name="edeadline" /> </br>
			</br>
			telecom: <input type="text" name="ttelecom" /> </br>
			</br>
			deadline: <input type="date" name="tdeadline" /> </br>
			</br>
			water: <input type="text" name="wwater"/> </br>
			</br>
			deadline: <input type="date" name="wdeadline"  required>
			</br>
			</br>
			<input type="submit" name="submit_btn"/>
			<a href="index.php">Back</a> </br>
		</form>
	</body>

</html>