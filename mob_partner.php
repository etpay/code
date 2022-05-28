<?php
include 'mob_auth_session.php';
if(isset($_POST['but_submit_ethio'])) {
	require 'db.php';
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
			echo "<script>alert('Partner Registered.');location.href='mob_index.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
if(isset($_POST['but_submit_elpa'])) {
	require 'db.php';
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
			echo "<script>alert('Partner Registered.');location.href='mob_index.php'</script>";
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
     <button type="button" class="btn-close" aria-label="Close"></button>
   <?php
include "config.php";    
$sql_query = "select * from partner where cid=$_SESSION['cid']";
$result = mysqli_query($con,$sql_query);
$row = mysqli_fetch_array($result);

$count = count($row);

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
    <div  class="container-sm"> 
        <h5 class="text-center"> Yesera Sew Payment System</h5></br>
       <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Bank
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<form method="post" action="">  
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
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       Employer
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<form method="post" action="">  
        <input type="text" class="form-control"  name="o" placeholder="organization" required></br>
        <input type="password" class="form-control" name="ob"  placeholder="Branch" required></br>
        <input type="password" class="form-control" name="id"  placeholder="ID no" required></br>
        <input type="text" class="form-control"  name="ofn" placeholder="Full Name" required></br>
        <input type="email" class="form-control"  name="op" placeholder="Phone number" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit_elpa" class="btn btn-primary ">Add Partner</button></br>
            </div>
    </form>       </div>
    </div>
  </div>
  </div>
</div>
<?php
}?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
