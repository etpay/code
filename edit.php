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

<?php

if(isset($_POST['submit_btn'])) {
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
    try {
        require 'db/db.php';
        require 'db/config.php';

		$eelectric =mysqli_real_escape_string($con,$_POST['eelectric'] );
		$edeadline =mysqli_real_escape_string($con, $_POST['edeadline'] );
		$ttelecom =	mysqli_real_escape_string($con,$_POST['ttelecom'] );
		$tdeadline =mysqli_real_escape_string($con, $_POST['tdeadline']);
		$wwater =mysqli_real_escape_string($con,$_POST['wwater'] );
		$wdeadline =mysqli_real_escape_string($con, $_POST['wdeadline']);
		$deadline2 =mysqli_real_escape_string($con, $_POST['deadline2']);
		$cu_id =mysqli_real_escape_string($con, $_POST['cu_id']);
		$sql = "UPDATE commit SET  electric=$eelectric,edeadline=$edeadline,telecom=$ttelecom, tdeadline=$tdeadline, water=$wwater, wdeadline=$wdeadline,paid= $deadline2 WHERE cu_id=$cu_id";
		 $q=" INSERT INTO commit2 SELECT * FROM commit WHERE cu_id=$cu_id";
       
        if ($con->query($q) === TRUE) {
            if ($con->query($sql) === TRUE) {
                echo "<script>alert('New Month Payment Made.');location.href='admin.php'</script>";
            } else {
                echo "Error: <br>" . $conn->error;
            }
        }else {
			echo "Error:<br>" . $conn->error;
		}



        // $query = "UPDATE commit SET  electric=?,edeadline=?, telecom=?,tdeadline=?, water=?,wdeadline=? ,paid=?WHERE cu_id=?";
        // $stmt = $dbc->prepare($query);
        // $stmt->bindParam(1, $_POST['eelectric']);
        // $stmt->bindParam(2, $_POST['edeadline']);
        // $stmt->bindParam(3, $_POST['ttelecom']);
        // $stmt->bindParam(4, $_POST['tdeadline']);
        // $stmt->bindParam(5, $_POST['wwater']);
        // $stmt->bindParam(6, $_POST['wdeadline']);
        // $stmt->bindParam(7, $_POST['deadline2']);
        // $stmt->bindParam(8, $_POST['cu_id']);
        // $q=' INSERT INTO commit2 SELECT * FROM commit WHERE cu_id=?';
        // $s = $dbc->prepare($q);
        // $s->bindParam(1, $_POST['cu_id']);
        // $s->execute();
        // if($stmt->execute()) {
        //     echo "<script>alert('New Month Payment Made.');location.href='admin.php'</script>";
        // } else {}
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else{
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
}
		// 
// 
$_SESSION["token"] = bin2hex(random_bytes(32));
$_SESSION["token-expire"] = time() + 1800; // 1 hour = 3600 secs
// 
// 
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
		

        <form  autocomplete="off"  action="" method="POST">
		  <!--  -->
            <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
            <!--  -->
            <?php
            if(isset($_POST['cu_id'])) {
                require 'db/config.php';
                $result = mysqli_query($con,"SELECT cu_id,name,partner FROM commit WHERE cu_id =".$_POST['cu_id']);
                $row = mysqli_fetch_row($result);
            }
		
            echo ' <input class="form-control" type="hidden"  name="cu_id" value= ';
            echo $row[0];echo '/>
	    </div></br>
	    
            Full Name: <input class="form-control"  type="text"  name="fname" value=';
            echo $row[1];echo ' disabled/> </br>
           </br> </br>
            partner: <input class="form-control" type="text" name="ppartner" value=';
            echo $row[2];echo ' disabled/>';
            ?> </br>
            </br>
            electric: <input class="form-control" type="text" name="eelectric" /> </br>
            </br>
            deadline: <input class="form-control" type="date" name="edeadline"  >
            </br></br>
            telecom: <input class="form-control" type="text" name="ttelecom" /> </br>
            </br></br>
            deadline: <input class="form-control" type="date" name="tdeadline"  >
            </br></br>
            water: <input class="form-control" type="text" name="wwater" /> </br>
            </br></br>
            deadline: <input class="form-control" type="date" name="wdeadline"  >
            </br></br>
            Change Paid status
            <input class="form-control" type="number" name="deadline2"  >
            </br></br>
            <input class="form-control" type="submit" name="submit_btn"/>
        </form>
    </body> 
</html>
