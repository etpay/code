<?php 
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true
]);
if(isset($_POST['but_submit'])) {
	
  
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
	require 'db/db.php';
	require 'db/config.php';
  $password = $_POST['txt_pwd'];
   // Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialchars = preg_match('@[^\w]@', $password);

  if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

  }
  else{
    echo 'Password is Strong';
	try {
    $txt_fname =mysqli_real_escape_string($con, $_POST['txt_fname']);
    $txt_uname =mysqli_real_escape_string($con,$_POST['txt_uname']);
    $pass=md5($password);
    $sql ="INSERT INTO `users`(`username`, `name`, `password`, `role`) VALUES ('$txt_uname','$txt_fname','$pass')";
		if ($con->query($sql)) {
      echo "<script>alert('Account Registered.');</script>";
		} else {
			
      echo "Error: <br>" . $conn->error;
		}
    // $pass=md5($_POST['txt_pwd']);
		// $query = "INSERT INTO `users` SET  `name`=?, `username`=?, `password`=?";
		// $stmt = $dbc->prepare($query);
		// $stmt->bindParam(1, $_POST['txt_fname']);
		// $stmt->bindParam(2, $_POST['txt_uname']);
		// $stmt->bindParam(3,$pass); 
		// if($stmt->execute()) {
		// 	echo "<script>alert('Account Registered.');</script>";
		// } else {}
	} catch(PDOException $e) {
		echo "Error catch: " . $e->getMessage();
	}
}
} 
// 
// 
$_SESSION["token"] = bin2hex(random_bytes(32));
$_SESSION["token-expire"] = time() + 1800; // 1 hour = 3600 secs
// 
// 
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
   <body></br>
    <div  class="container-sm"> 
        <h5 class="text-center"> Yesera Sew Payment System</h5></br>
        <form  autocomplete="off"  method="post" action=""  oninput='txt_pwd2.setCustomValidity(txt_pwd2.value != txt_pwd.value ? "Passwords do not match." : "")'>
             <!--  -->
            <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
            <!--  -->
		<h2 class="text-center"> Register </h2></br>
  
        <input type="text" class="form-control"  name="txt_fname" placeholder="Full Name" required></br>
        <input type="text" class="form-control"  name="txt_uname" placeholder="Username" required></br>
        <input type="password" class="form-control" name="txt_pwd"  placeholder="Password" required></br>
        <input type="password" class="form-control" name="txt_pwd2"  placeholder="Conferm Password" required></br>        

      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit" class="btn btn-primary ">Register</button></br>
            </div>
   
    </form>    
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
