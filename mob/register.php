<?php
if(isset($_POST['but_submit'])) {
	require '../db/db.php';
      session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true
]);

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
		$query = "INSERT INTO `account` SET  `full_name`=?, `username`=?, `password`=?, `phone_number`=?, `email`=?, `po_box`=?, `addres`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['txt_fname']);
		$stmt->bindParam(2, $_POST['txt_uname']);
		$stmt->bindParam(3,md5($_POST['txt_pwd'])); 
		$stmt->bindParam(4, $_POST['txt_pnumber']);
		$stmt->bindParam(5, $_POST['txt_email']);
		$stmt->bindParam(6, $_POST['txt_pbox']);
		$stmt->bindParam(7, $_POST['txt_adress']);
		if($stmt->execute()) {
			echo "<script>alert('Account Registered.');location.href='login.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
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
   <body></br>
    <div  class="container-sm"> 
        <h5 class="text-center"> Yesera Sew Payment System</h5></br>
        <form  autocomplete="off"  method="post" action=""  oninput='txt_pwd2.setCustomValidity(txt_pwd2.value != txt_pwd.value ? "Passwords do not match." : "")'>
            <h2 class="text-center"> Register </h2></br>
  
        <input type="text" class="form-control"  name="txt_fname" placeholder="Full Name" required></br>
        <input type="text" class="form-control"  name="txt_uname" placeholder="Username" required></br>
        <input type="password" class="form-control" name="txt_pwd"  placeholder="Password" required></br>
        <input type="password" class="form-control" name="txt_pwd2"  placeholder="Conferm Password" required></br>        
        <input type="text" class="form-control"  name="txt_pnumber" placeholder="Phone number" required></br>
        <input type="email" class="form-control"  name="txt_email" placeholder="Email" required></br>
        <input type="text" class="form-control"  name="txt_pbox" placeholder="Po Box" required></br>
        <input type="text" class="form-control"  name="txt_adress" placeholder="Adress" required></br>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
  <label class="form-check-label" for="flexCheckDefault">
    By clicking Register, you agree to our <a href="terms.php"> Terms and Conditions </a>
  </label>
</div>

      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit" class="btn btn-primary ">Register</button></br>
            </div>
      <!-- Register buttons -->
      <div class="text-center">
        <p>Already a member? <a href="login.php">Login</a></p>
      </div>
    </form>    
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
