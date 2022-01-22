<?php

include '../config/database.php';
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT username FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("location: index.php");
            exit;
        }
    }
    header("location: login.php?error=1");
}
