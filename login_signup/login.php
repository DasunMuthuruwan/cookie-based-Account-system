<?php
session_start();
include '../db/db_connection.php';
include '../common/header.php' ;

    if(!empty($_COOKIE['isLoggedIn'])){
        header('Location:'.site_url('home.php'));
    }
?>
    <div class="container">
        <div class="row mt-5">
            <div class="card shadow col-md-6 offset-md-3">
                <div class="card-header text-center">
                    <p style="font-weight: bold;">User Login</p>
                </div> 
                <div class="card-body">
                    <p style="color:red;font-weight:bold;">
                        <?php
                            if(!empty($_SESSION['login_errors'])){
                                foreach($_SESSION['login_errors'] as $error){
                                    echo $error."<br/>";
                                }
                            }
                            if(!empty($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                            }
                        ?>
                    </p>
                    <form action="<?php echo site_url('db/login.php'); ?>" method="POST">
                        <div class="form-group mt-2">
                            <label for="email">Email Address</label>
                            <input type="email" placeholder="email address" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Password</label>
                            <input type="password" placeholder="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input type="checkbox" name="remember_me" class="custom-control-input">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include '../common/footer.php' ;
    unset($_SESSION['login_errors']);
    unset($_SESSION['msg']);
?>