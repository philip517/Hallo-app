<?php 
session_start();
require "config/conn.php";


if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){
    session_unset();
    session_destroy();
    session_start();
}

    if ( isset($_SESSION['error'])){
    $error=$_SESSION['error'];
}

?>



<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="assets/css/pikaday.min.css">
    <style>
    .space {
        margin-top: 120px;
    }
    </style>
</head>

<body>
    <div class="container space">
        <div class="row mb-5"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-5">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="4em" height="5em" fill="#0ea0ff"
                                viewBox="0 0 16 16" class="bi bi-person">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                </path>
                            </svg></div>
                        <form action="login.php" class="text-center" method="post">
                            <div class="mb-3"><input class="form-control" type="text" name="username"
                                    placeholder="User Name">
                            </div>
                            <div class="mb-3"><input class="form-control" type="password" name="password"
                                    placeholder="Password"></div>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit"
                                    value="Login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>