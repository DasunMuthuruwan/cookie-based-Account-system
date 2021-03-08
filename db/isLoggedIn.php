<?php
    session_start();

    if(!isset($_SESSION['user_details'])){
        $_SESSION['msg'] = 'You must Login';
        header('Location:'.site_url('login_signup/login.php'));
    }

?>