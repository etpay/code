<?php
    session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true
]);
    if(!isset($_SESSION["cid"])) {
        header("Location: login.php");
        exit();
    }
?>