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
<html>

<body>
	<button type="button" class="btn-close" aria-label="Close"></button>
<form action="" method="POST">
Full Name: <input type="text" name="name" required/> </br>
</br>
Email: <input type="text" name="email" required/> </br>
</br>
Subject: <input type="text" name="subject" /> </br>

</br>
Message: <input type="text" name="message" /> </br>
</br>
</br>
<input type="submit" name="submit_btn"/>
<a href="mob_index.php">Back</a> </br>
</form>
</body>
</html>