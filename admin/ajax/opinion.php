<?php
include_once '../../config/fieldvalues.php';
$base_url = url();
session_start();
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: $base_url/admin/login.php");
    exit;
}

function base64_to_image($base64_string)
{
    $base64_string = substr($base64_string, strpos($base64_string, ",") + 1);
    $image_name = "\\images\\opinions\\" . uniqid() . ".jpg";
    $output_file = $_SERVER['DOCUMENT_ROOT']  . $image_name;
    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return $image_name;
}


// check post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // include database connection
    include_once '../../config/database.php';
    $id = $_POST['id'];

    if (!isset($_POST["delete"])) {

        $name = $_POST['name'];
        $opinion = $_POST['opinion'];
        $imageUpdate = '';
        if (isset($_POST['imageUpdate']))
            $imageUpdate = $_POST['imageUpdate'];
        $image = $_POST['imgUrl'];
        // make sure data is not empty
        if (
            !empty($name) &&
            !empty($opinion)
        ) {
            // convert base 64 to image from data
            $imgUrl;
            if ($imageUpdate == 'true')
                $imgUrl = base64_to_image($image);

            // check is id null or empty
            if ($id == '') {
                $query = "insert into opinions (imgUrl,name, opinion) values('" . mysqli_real_escape_string($conn, $imgUrl) . "','$name', '$opinion')";
                if ($conn->query($query) === true) {
                    $max = $conn->query("select max(id) from opinions");
                    echo $max->fetch_row()[0];
                } else {
                    echo "alert('Error: " . "<br>" . $conn->error . "');";
                }
            } else {
                if ($imageUpdate == 'true')
                    $query = "UPDATE opinions SET imgUrl='" . mysqli_real_escape_string($conn, $imgUrl) . "', name = '$name', opinion= '$opinion' WHERE id = '$id'";
                else
                    $query = "UPDATE opinions SET name = '$name', opinion= '$opinion' WHERE id = '$id'";
                if ($conn->query($query) === true) {
                    $arr = array();
                    $arr["id"] = $id;
                    $arr["name"] = $name;
                    $arr["opinion"] = $opinion;
                    echo json_encode($arr);
                } else {
                    echo "{error:'Server error'}";
                    header("HTTP/1.0 500 Internal Server Error");
                }
            }
        }
    } else {
        if (!empty($id)) {
            if ($conn->query("DELETE FROM opinions WHERE id=$id") === true) {
                echo '{
                    "success":true
                 }';
            } else {
                echo "{error:'Server error'}";
                header("HTTP/1.0 500 Internal Server Error");
            }
        }
    }
} else {
    echo "{error:'Error: Insufficient data'}";
    header("HTTP/1.0 400 Bad Request");
}
