<?php
    session_start();
    unset($_SESSION['cid']);
    unset($_SESSION['uname']);
    header('location:mob_login.php');
?>