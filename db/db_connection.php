<?php 
    $db = mysqli_connect('localhost','root',null,'user_register_login');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MYSQL" . mysqli_connect_error();
    }

    function site_url($data = false){
        return 'http://'.$_SERVER['HTTP_HOST'].'/user_login_register/'.$data;
    }


?>