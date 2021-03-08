<?php
    session_start();
    session_destroy();
    include '../db/db_connection.php';

    setcookie('isLoggedIn',$cookie_data, time() - (81400*30),'/');

    header('Location:'.site_url('login_signup/login.php'));
?>