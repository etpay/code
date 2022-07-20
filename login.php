<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

</style>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Yesrasew payment system</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="txt_uname" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="txt_pwd" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="but_submit" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include "db/config.php";
    session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true
]);

if(isset($_POST['but_submit'])){

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
                header('Location:Register');
            } else {
                $_SESSION['uname'] = $uname;
                header('Location:Admin');
            }
            
        }else{
           echo "<script>alert('Not meet with credentials.')</script>";
        }

    }

}
?>
