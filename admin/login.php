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
                    <?php
                    if (isset($_GET["error"]))
                        echo '<div class="alert alert-warning alert-dismissible fade show mt-2" id="error" role="error">
                            <strong>Error !</strong> Invalid password or username..
                        </div>'
                    ?>
                    <div class="card border border-primary" style="border-radius: 1rem;">
                        <div class="card-body p-3 px-4 px-lg-5 text-center">
                            <form class="mb-md-5 mt-md-4" action="validate_login.php" method="post">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-dark-50 mb-5">Please enter your username and password!</p>

                                <div class="form-outline mb-4">

                                    <input tabindex="1" type="text" autofocus placeholder="username" id="username" name="username" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <input tabindex="2" type="password" placeholder="Password" id="password" name="password" class="form-control form-control-lg" />
                                </div>

                                <p class="small m2-5 "><a class="text-dark" href="javascript:forgetPassword();">Forgot password?</a></p>
                                <div class="alert alert-info fade mt-0" id="forget-password" role="alert">
                                    Please contact <strong>Service Provider</strong> to recover account
                                    <!-- <button type="button" class="btn-close ms-1 btn-sm" data-bs-dismiss="alert" aria-label="Close"></button> -->
                                </div>
                                <button tabindex="3" class="btn btn-outline-primary btn-lg px-5 mt-lg-2" type="submit">Login</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function forgetPassword() {
            document.getElementById("forget-password").classList.add('show')
            setTimeout(() => {
                document.getElementById("forget-password").classList.remove('show')
            }, 6000)
        }
        setTimeout(() => {
            if (document.getElementById("error"))
                document.getElementById("error").classList.remove('show')
        }, 5000)
    </script>
</body>

</html>