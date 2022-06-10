<?php
    session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true
]);
    unset($_SESSION['uname']);
    header('location:login');
?>