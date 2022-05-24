<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){
        $sql_query = "select count(*) as cntUser from account where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location:mobindex.php');
        }else{
            echo "Invalid username and password";
        }
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
        <div class="container">
            <h1> Yesera Sew Payment System</h1>
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login </h1>
                    
                        <input type="text" class="form-control" id="txt_uname" name="txt_uname" placeholder="Username" />
                  
                        <input type="password" class="form-control" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                   
                        <input type="submit" class="btn btn-success" value="Submit" name="but_submit" id="but_submit" />
                        <a href="">Back</a> </br>
                    
                </div>
            </form>
        </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

</html>

