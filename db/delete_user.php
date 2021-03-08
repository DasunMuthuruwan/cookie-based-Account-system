<?php
    session_start();
    include '../db/db_connection.php';
    if($_POST['delete_user'] = true){
        $id = $_POST['user_id'];
        $query = "DELETE FROM users WHERE id='$id'";
        $result = mysqli_query($db,$query);

        if(mysqli_affected_rows($db)>0){
            $_SESSION['msg'] = 'Your account has been deleted';
            header('Location:'.site_url('login_signup/login.php'));
        }
    }

?>