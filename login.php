<?php session_start(); ?>
<?php include "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Login</title>
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fontawesome/css/all.min.css">
    
</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        header('location: welcome.php');
    }
    ?>
    

    <?php

    $user_color = "";
    $password_color = "";

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));


        // query
        $query = "SELECT `user_id`, `user_name` FROM `users` WHERE `user_name` = '$username' AND `user_password`='$password';";
        $query_result = mysqli_query($conn, $query);

        if (!mysqli_num_rows($query_result) > 0) {
            $user_color = "border-danger";
            $password_color = "border-danger";
        } else {
            while($row = mysqli_fetch_assoc($query_result)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['user_id'];
            }
            header('location: welcome.php');
        }
    } else {
        $username = "";
        $password = "";
    }


    ?>

    <!-- todo login -->
    <div class="container text-center d-flex justify-content-center align-items-center vh-100 flex-column">

       
        <div class="container-fluid">
            <h1 class="p-3 form__title text-dark">Welcome</h1>
            <div class="container d-flex justify-content-center mb-4">
                <div class="image bg-primary"></div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <form action="" method="post">
                    <div class="my-3">
                        <input type="text" class="<?php echo $user_color; ?> form-control border-top-0 border-left-0 border-right-0" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username">
                        
                    </div>
                    <div class="my-3 position-relative">
                        <input type="password" class="<?php echo $password_color; ?> form-control border-top-0 border-left-0 border-right-0" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password">
                        <div class="position-absolute" style="top:5px; right:10px;">
                            <a href="#" class="text-dark eye"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="my-4">
                        <input type="submit" class="form-control border bg-success text-white" name="login" id="login">
                    </div>
                </form>
            </div>
        </div>


        <div class="mt-5 text-left">
            <ul class="container">
                <li>Forgot <a href="forgot.php" class="text-success">Username/Password?</a></li>
                <li>Don't have on account? <a href="signup.php" class="text-success">SignUp</a></li>
            </ul>
        </div>


    </div>
    </div>




    <!-- JS -->
    <script src="/vendors/js/jquery.min.js"></script>
    <script src="/vendors/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.eye').on('click', function() {
                if ($(this).children().is('i.fa.fa-eye')) {
                    $(this).children().attr('class', 'fa fa-eye-slash');
                    $('#password').attr('type', 'text');
                } else {
                    $(this).children().attr('class', 'fa fa-eye');
                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>

</body>

</html>