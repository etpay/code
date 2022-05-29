<?php
include 'mob_auth_session.php';


if(isset($_POST['submit_btn'])) {
require 'db.php';
try {
$query = "insert into comment (name, email, subject,mesage) values (?, ?, ?, ?)";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_POST['name']);
$stmt->bindParam(2, $_POST['email']);
$stmt->bindParam(3, $_POST['subject']);
$stmt->bindParam(4, $_POST['message']);
	if($stmt->execute()) {
		echo "<script>alert('New Payment Saved.');location.href='mob_index.php'</script>";
	} else {

	}
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

	<a href="mob_index.php" class="btn-close " aria-label="Close"></a>
  <h2>Give a Comment</a>
<div  class="container-sm"> 
	<form action="" method="POST">
 <input type="text" class="form-control" name="name" placeholder="Full Name"required/> </br>

 <input type="text" class="form-control" name="email" placeholder="Email"required/> </br>

 <input type="text" class="form-control" name="subject" placeholder="Subject"/> </br>


 <input type="text" class="form-control" name="message" placeholder="Message"/> </br>
</br>

<input type="submit" class="btn btn-primary " value="Send" name="submit_btn"/>
</form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>