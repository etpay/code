<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html>
	<head>
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
			echo "<script>alert('New Payment Saved.');location.href='admin.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
?>
		<div class="container register-form">
			<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Yesrasew payment system</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">

		<form action="" method="POST">
			<div class="form-group">
			Full Name: <input  class="form-control" type="text" name="fname" required/> 
				
				</div><br>
			
			<div class="form-group">
			partner: <input class="form-control" type="text" name="ppartner" required/> 
			
				</div><br>
			<div class="form-group">
			electric: <input class="form-control" type="text" name="eelectric" /> </br>

			</div></br>
						<div class="form-group">
			deadline: <input class="form-control" type="date" name="edeadline" /> </br>
			</div></br>
				<div class="form-group">
			telecom: <input  class="form-control"type="text" name="ttelecom" /> </br>
			</div></br>
			<div class="form-group">
			deadline: <input class="form-control" type="date" name="tdeadline" /> </br>
			</div></br>
	<div class="form-group">
			water: <input class="form-control" type="text" name="wwater"/> </br>
			</div></br>
<div class="form-group">
			deadline: <input class="form-control" type="date" name="wdeadline"  required>
			</div></br>
			</br>
<div class="form-group">
			<input class="form-control"type="submit" name="submit_btn"/>
	</div></br>
<div class="form-group">
			<a class="form-control" href="admin.php">Back</a> </br>
</div>
		</form>
	</body>

</html>
