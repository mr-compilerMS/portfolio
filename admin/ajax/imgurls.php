<?php

include_once '../../config/fieldvalues.php';
$base_url = url();
session_start();
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: $base_url/admin/login.php");
    exit;
}
function base64_to_image($base64_string, $imgUrl)
{
    $base64_string = substr($base64_string, strpos($base64_string, ",") + 1);
    $image_name = '';
    if ($imgUrl != '')
        $image_name = $imgUrl;
    else
        $image_name = "\\images\\" . uniqid() . ".jpg";
    $output_file = $_SERVER['DOCUMENT_ROOT']  . $image_name;
    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return $image_name;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../../config/database.php';
    $id = $_POST['id'];
    $value = $_POST['value'];

    $query = "SELECT * FROM imgurls WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $imgUrl = $result->fetch_assoc()['url'];
        // echo $query;
        // echo $imgUrl;
        $imgUrl = base64_to_image($value, $imgUrl);
        $query = "UPDATE imgurls SET `url` = '" . mysqli_real_escape_string($conn, $imgUrl) . "' WHERE id = '$id'";
        if ($conn->query($query) === true) {
            $arr = array();
            $arr['success'] = true;
            $arr['url'] = $imgUrl;
            echo json_encode($arr);
        } else {
            $arr = array();
            $arr['success'] = false;
            echo json_encode($arr);
        }
    } else {
        $imgUrl = base64_to_image($value, '');
        $query = "insert into imgurls (id,url) values('$id','" . mysqli_real_escape_string($conn, $imgUrl) . "')";
        if ($conn->query($query) === true) {
            $arr = array();
            $arr['success'] = true;
            $arr['url'] = $imgUrl;
            echo json_encode($arr);
        } else {
            $arr = array();
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }
}
