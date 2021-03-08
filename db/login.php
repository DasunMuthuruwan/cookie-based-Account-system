<?php
session_start();
include '../db/db_connection.php';
$login_errors = [];

//validate email

if(empty($_POST['email'])){
    array_push($login_errors,'email is required');
}
else{
    $email = mysqli_real_escape_string($db, $_POST['email']);
}

//validate password
if(empty($_POST['password'])){
    array_push($login_errors, 'password is required');
}
else{
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password);
}

if(count($login_errors)>0){
    $_SESSION['login_errors'] = $login_errors;
    header('Location:'.site_url('login_signup/login.php'));
}
else{
    // $pwd = password_verify($password,);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)<1){
        array_push($login_errors,'Oops Login credential wrong..');
        $_SESSION['login_errors'] = $login_errors;
        header('Location:'.site_url('login_signup/login.php'));
    }
    // login details matched
    else{
        $user_details = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $cookie_data = implode(",",$user_details);
        if(!empty($_POST['remember_me']) && $_POST['remember_me']='on'){
            setcookie('isLoggedIn',$cookie_data, time() + (81400*30),'/');
        }

        $_SESSION['user_details'] = $user_details;
        header('Location:'.site_url('home.php'));
    }

}

?>