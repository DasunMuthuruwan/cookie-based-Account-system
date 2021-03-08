<?php 

    session_start();
    include '../db/db_connection.php';

    $signup_errors = [];
    //validate email

    if(!empty($_POST['email'])){
        $email = mysqli_real_escape_string($db,$_POST['email']);

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($db,$query);
        $user = mysqli_fetch_assoc($result);
        if($user){
            //if user with same email address

            array_push($signup_errors,"Email is already exist");
            $_SESSION['signup_errors']=$signup_errors;
            header('Location:'.site_url('login_signup/register.php'));
        }
        else{
            //store the email in the session
            $_SESSION['email'] = $email;
        }

    }
    else{
        array_push($signup_errors,"Email is required");
    }

    //validate password
    if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if($password !== $confirm_password){
            array_push($signup_errors,'Password is not match');
        }
        if(strlen($password)<8){
            array_push($signup_errors,'password length must be minimum 8 charactors');
        }
    }
    else{
        array_push($signup_errors,'both password fields are required');
    }

    //no error validation, store user data in database

    if(count($signup_errors) > 0){
        $_SESSION['signup_errors'] = $signup_errors;
        header('Location:'.site_url('login_signup/register.php'));
    }
    else{
        $password = md5($password);
        
        $query = "INSERT INTO users(email, password) VALUES('$email','$password')";
        mysqli_query($db, $query);

        //Last inserted row id
        $last_id = mysqli_insert_id($db);

        //Retrive Last row

        $row = mysqli_query($db, "SELECT * FROM users WHERE id='$last_id'");

        $user_details = mysqli_fetch_array($row,MYSQLI_ASSOC);
        $_SESSION['user_details'] = $user_details;

        //Redirect Home DashBoard

        header('Location:'.site_url('home.php'));
    }

?>