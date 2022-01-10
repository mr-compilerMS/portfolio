<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Admin Portfolio</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: index.php");
        exit;
    }
    ?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card border border-primary" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <form class="mb-md-5 mt-md-4" action="validate_login.php" method="post">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-dark-50 mb-5">Please enter your username and password!</p>

                                <div class="form-outline mb-4">

                                    <input type="text" placeholder="username" id="username" name="username" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control form-control-lg" />
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-dark" href="#!">Forgot password?</a></p>

                                <button class="btn btn-outline-primary btn-lg px-5" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>