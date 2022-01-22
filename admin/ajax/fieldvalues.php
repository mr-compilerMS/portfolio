<?php

include_once '../../config/fieldvalues.php';
$base_url = url();
session_start();
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: $base_url/admin/login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../../config/database.php';
    $id = $_POST['id'];
    $value = $_POST['value'];

    $query = "SELECT * FROM fieldvalues WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $query = "UPDATE fieldvalues SET `value` = '$value' WHERE id = '$id'";
        if ($conn->query($query) === true) {
            $arr = array();
            $arr['success'] = true;
            echo json_encode($arr);
        } else {
            $arr = array();
            $arr['success'] = false;
            echo json_encode($arr);
        }
    } else {
        $query = "insert into fieldvalues (id,value) values('$id','$value')";
        if ($conn->query($query) === true) {
            $arr = array();
            $arr['success'] = true;
            echo json_encode($arr);
        } else {
            $arr = array();
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }
}
