<?php
session_start();
include '../db/db_connection.php';
include '../common/header.php' ;
?>    
    <div class="container">
        <div class="row mt-5">
            <div class="card shadow col-md-6 offset-md-3">
                <div class="card-header">
                    <p class="font-weight-bold">User Register</p>
                </div> 
                <div class="card-body">
                    <p style="color:red;font-weight:bold;">
                        <?php
                            if(!empty($_SESSION['signup_errors'])){
                                foreach($_SESSION['signup_errors'] as $error){
                                    echo $error."<br/>";
                                }
                            }
                        ?>
                    </p>
                    <form action="<?php echo site_url('db/signup.php'); ?>" method="POST">
                        <div class="form-group mt-2">
                            <label for="email">Email Address</label>
                            <input type="email" placeholder="email address" name="email" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Password</label>
                            <input type="password" placeholder="password" name="password" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" placeholder="confirm password" name="confirm_password" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Register Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php unset($_SESSION['signup_errors'])?>
<?php include '../common/footer.php' ;?>