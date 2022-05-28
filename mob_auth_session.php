<?php
    session_start();
    if(!isset($_SESSION["cid"])) {
        header("Location: mob_login.php");
        exit();
    }
?>