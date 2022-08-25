<?php
include 'auth_session.php';
if(isset($_POST['but_submit_ethio'])) {
	require '../db/db.php';
	try {
    		$query = "INSERT INTO `partner` set `full_name`=?, `organization`=?, `branch`=?, `oid`=?, `phone_number`=?, `type`=1, `cid`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['bfn']);
		$stmt->bindParam(2, $_POST['b']);
		$stmt->bindParam(3, $_POST['bb']);
		$stmt->bindParam(4, $_POST['an']);
		$stmt->bindParam(5, $_POST['bp']);
		$stmt->bindParam(6, $_SESSION['cid']);
		if($stmt->execute()) {
			echo "<script>alert('Partner Registered.');location.href='index.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
if(isset($_POST['but_submit_elpa'])) {
	require '../db/db.php';
	try {
		$query = "INSERT INTO `partner` set `full_name`=?, `organization`=?, `branch`=?, `oid`=?, `phone_number`=?, `type`=2, `cid`=?";
			
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['ofn']);
		$stmt->bindParam(2, $_POST['o']);
		$stmt->bindParam(3, $_POST['ob']);
		$stmt->bindParam(4, $_POST['id']);
		$stmt->bindParam(5, $_POST['op']);
		$stmt->bindParam(6, $_SESSION['cid']);
		if($stmt->execute()) {
			echo "<script>alert('Partner Registered.');location.href='index.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
?>
<!doctype html>
<html lang="en">
  <head>
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'">
<meta http-equiv="X-WebKit-CSP" content="default-src 'self'; script-src 'self'">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

   </head>
   <body>

   <div class="container">
   </br>
     <a href="index.php" class="btn-close px-2" aria-label="Close"></a>
    </br>
    </br>
   <?php
include "../db/config.php";    
$cid=$_SESSION['cid'];
$sql_query = "select * from partner where cid='".$cid."'";
$result = mysqli_query($con,$sql_query);
$row = mysqli_fetch_array($result);

$count = ($row==null) ? 0 : count($row) ;


if($count > 0){
   if ($row['type']==1) {
   echo '  <div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">';
  echo '<li class="list-group-item">Bank ';echo $row['organization'] ;echo '</li>
    <li class="list-group-item">Branch ';echo $row['branch'] ;echo '</li>
   <li class="list-group-item">Account no ';echo $row['oid'] ;echo '</li>
    <li class="list-group-item">Full Name ';echo $row['full_name'] ;echo '</li>
    <li class="list-group-item">Phone number ';echo $row['phone_number'] ;echo '</li>
  </ul>
</div>';
   } else {
      echo '  <div class="card" style="width: 18rem;">
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
?>

        <h5 class="text-center"> Yesera Sew Payment System</h5></br>
       <div class="container">
    <h2 class="text-center" >  Bank    </h2>
    
<form  autocomplete="off"  method="post" action="">  
        <input type="text" class="form-control"  name="b" placeholder="Bank" required></br>
        <input type="text" class="form-control"  name="bb" placeholder="Branch" required></br>
        <input type="text" class="form-control"  name="an" placeholder="Account no" required></br>
        <input type="text" class="form-control" name="bfn"  placeholder="Full Name" required></br>
        <input type="text" class="form-control"  name="bp" placeholder="Phone number" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_ethio" class="btn btn-primary ">Add Partner</button></br>
            </div>
    </form>       </div>
  
  <div class="container">
    <h2 class="text-center" >Employer    </h2>
   
<form  autocomplete="off"  method="post" action="">  
        <input type="text" class="form-control"  name="o" placeholder="organization" required></br>
        <input type="text" class="form-control" name="ob"  placeholder="Branch" required></br>
        <input type="text" class="form-control" name="id"  placeholder="ID no" required></br>
        <input type="text" class="form-control"  name="ofn" placeholder="Full Name" required></br>
        <input type="text" class="form-control"  name="op" placeholder="Phone number" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_elpa" class="btn btn-primary ">Add Partner</button></br>
            </div>
    </form>       </div>


<?php
}?>
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
