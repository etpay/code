<?php
include "db/config.php";
    session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true
]);

if(isset($_POST['but_submit'])){
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
//     unset($_SESSION["token"]);
//     unset($_SESSION["token-expire"]);
    echo "OK";
  }
}

// (D) INVALID TOKEN
else { exit("INVALID TOKEN*-"._SESSION["token"].'-------------'.$_POST["token"]); }
// 
// 
    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $pass = mysqli_real_escape_string($con,$_POST['txt_pwd']);
    $password = md5($pass);


    if ($uname != "" && $password != ""){

        $sql_query = "select role from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

       $count = ($row==null) ? 0 : count($row) ;

        if($count > 0){
            
            if ($row['role']=='Admin') {
                 $_SESSION['uname'] = $uname;
                header('Location:register.php');
            } else {
                $_SESSION['uname'] = $uname;
                header('Location:admin.php');
            }
            
        }else{
           echo "<script>alert('Not meet with credentials.')</script>";
        }

    }

}
?>
