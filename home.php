<?php
include_once './common/header.php';
include './db/db_connection.php';
include './db/isLoggedIn.php';
?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container container-fluid">
        <a class="navbar-brand" style="color: white;" href="/">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="form-inline my-2">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: white;" href="<?php echo site_url('db/logout.php') ?>">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <div class="card shadow">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center mt-4">Login Details</h1>
            <p class="text-center"><?php echo $_SESSION['user_details']['email'] ?></p>
            <form action="<?php echo site_url('db/delete_user.php') ?>"  method="POST">
                <input type="hidden" name="delete_user" value="true">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_details']['id'] ?>">
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Delete Account" class="btn btn-danger btn-sm mx-auto mb-4">
                </div>
            </form>
        </div>
    </div>
</div>