<?php include "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Todo List</title>
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fontawesome/css/all.min.css">
</head>

<body>

    <?php

    $user_color = "";
    $email_color = "";
    $password_color = "";


    if (isset($_POST['signup'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $user_color = empty($username) ? "border-danger" : "border-success";
        $email_color = empty($email) ? "border-danger" : "border-success";
        $password_color = empty($password) ? "border-danger" : "border-success";

        // user
        $re = '/^[a-z]+[a-z0-9]+$/m';
        $user_color = preg_match($re, $username) ? (((strlen($username) > 6) && (strlen($username) < 12))  ? "border-success" :
            "border-danger") : "border-danger";

        // email
        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $re = '/^[a-z-_]+[a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/m';
        $email_color = preg_match($re, $email) ? "border-success" : "border-danger";

        // password
        $re = '/[a-z]+[a-z0-9]+/m';
        $password_color = preg_match($re, $password) ? (((strlen($password) >= 8) && (strlen($password) <= 20))  ? "border-success" : "border-danger") : "border-danger";


        $query_user = "SELECT `user_name` FROM `users` WHERE `user_name` = '$username';";
        $query_email = "SELECT `user_email` FROM `users` WHERE `user_email` = '$email';";

        $query_user_result =  mysqli_query($conn, $query_user);
        $query_email_result =  mysqli_query($conn, $query_email);

        $user_color = mysqli_num_rows($query_user_result)  ? "border-danger" : "border-success";
        $email_color = mysqli_num_rows($query_email_result) ? "border-danger" : "border-success";


        if ($user_color == 'border-success' && $email_color == 'border-success' && $password_color == 'border-success') {
            $signup_query = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES ('$username', '$email', '$password')";

            if (!mysqli_query($conn, $signup_query)) {
                echo "Query failed " . mysqli_error($conn);
            } else {
                header("location: signup.php");
            }
        }
    } else {
        $username = "";
        $email = "";
        $password = "";
    }
    ?>


    <!-- todo login -->
    <div class="container text-center d-flex justify-content-center align-items-center vh-100 flex-column">

        <div class="container-fluid">
            <h1 class="p-3 form__title text-dark">Create Account</h1>
        </div>
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <form action="" method="post">
                    <div class="my-3">
                        <input type="text" class="<?php echo $user_color; ?> form-control border-top-0 border-left-0 border-right-0" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username">

                    </div>
                    <div class="my-3">
                        <input type="email" class="<?php echo $email_color; ?> form-control border-top-0 border-left-0 border-right-0" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email address">
                    </div>
                    <div class="my-3 position-relative">
                        <input type="password" class="<?php echo $password_color; ?>  form-control border-top-0 border-left-0 border-right-0" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password (only letters & numbers)">
                        <div class="position-absolute" style="top:5px; right:10px;">
                            <a href="#" class="text-dark eye"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="condition" id="condition" required>
                        <label for="condition" class="form-check-label">I agree all statement in terms of service</label>
                    </div>
                    <div class="my-4">
                        <input type="submit" class="form-control border bg-success text-white" value="Sign Up" name="signup" id="signup">
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-5 text-left">
            <ul class="container">
                <li>Have already an account? <a href="login.php" class="text-success">Login</a></li>
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