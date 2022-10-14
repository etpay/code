<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-WebKit-CSP" content="default-src 'self'; script-src 'self'">
<style>
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}

</style>
	</head>
		<body>
			<div class="container register-form">
			<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Yesrasew payment system</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">

				<?php
				
				
				if(isset($_POST['cu_id'])) {
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
					require 'db/config.php';
					mysqli_query($con,"UPDATE  commit SET paid=true WHERE cu_id =".$_POST['cu_id']); 
				}
				echo "This Month and year is</br>";
				echo date("m-Y");
				?>
				</br>
				<a href="add.php">New payment</a> </br>
				<a href="searchById.php">search by id</a> </br>
				<a href="searchByPartner.php">search by partner</a> </br>
				<a href="date.php">search by date</a> </br>
				<input type="submit" class="button" value="print" onClick="window.print()" />
				<a href="admin.php">Back</a> </br>
				</br>
				<?php
	// 
// 
$_SESSION["token"] = bin2hex(random_bytes(32));
$_SESSION["token-expire"] = time() + 1800; // 1 hour = 3600 secs
// 
// 
				require 'db/db.php';
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
				// echo "<td><a href='edit.php?cu_id={$cu_id}'>New Month</a> </td>";
				echo "<td>";
				?>
							<form action="edit.php" method="post">
								  <!--  -->
            <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
            <!--  -->
								<input type="hidden" name="cu_id" value=<?php echo $cu_id; ?>>
								<input type="submit" value="New Month">
							</form>
							<?php
			
			echo "</td>";
				echo "</tr>";
				}
				} catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
			?>
				</table> </br>
			<script>    
				if(typeof window.history.pushState == 'function') {
					window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
				}
			</script>
			<?php
		 		require 'db/config.php';
				echo "<h2>";echo " receiver=> electric ";echo "</h2>";
				//sql query
				$sql = "SELECT SUM(electric) from commit ";
				$result = $con->query($sql);
				//display data on web page
				while($row = mysqli_fetch_array($result)){
					echo " General Total: ". $row['SUM(electric)'];
					echo "<br>";
				}
				echo "<h2>";echo " receiver=> telecom ";echo "</h2>";
				//sql query
				$sql = "SELECT SUM(telecom) from commit";
				$result = $con->query($sql);
				//display data on web page
				while($row = mysqli_fetch_array($result)){
					echo " General Total: ". $row['SUM(telecom)'];
					echo "<br>";
				}
				echo "<h2>";echo " receiver=> water ";echo "</h2>";
				//sql query
				$sql = "SELECT SUM(water) from commit";
				$result = $con->query($sql);
				//display data on web page
				while($row = mysqli_fetch_array($result)){
					echo " General Total: ". $row['SUM(water)'];
					echo "<br>";
				}
				//close the connection
				$con->close();
				
				?>
			</body>
</html>
