<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list - Forgot password</title>
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>


    <!-- todo login -->
    <div class="container text-center d-flex justify-content-center align-items-center vh-100 flex-column">

        <div class="container-fluid">
            <h1 class="p-3 form__title text-dark">Fogot Password</h1>
        </div>
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <form action="/">
                    <div class="my-3">
                        <input type="email" class="form-control border-top-0 border-left-0 border-right-0" name="register_email" id="register_email" placeholder="Email address">
                    </div>
                    <div class="my-4">
                        <input type="submit" class="form-control border bg-success text-white" value="Send" name="send" id="send">
                    </div>
                </form>
            </div>
        </div>


        <div class="mt-5 text-left">
            <ul class="container">
                <li>Have already an account? <a href="login.php" class="text-success">Login</a></li>
                <li>Don't have on account? <a href="signup.php" class="text-success">SignUp</a></li>
            </ul>
        </div>


    </div>
    </div>




    <!-- JS -->
    <script src="/vendors/js/jquery.min.js"></script>
    <script src="/vendors/js/bootstrap.bundle.min.js"></script>

</body>

</html>