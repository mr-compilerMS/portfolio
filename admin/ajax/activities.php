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
        $image_name = "\\images\\activities\\" . uniqid() . ".jpg";
    $output_file = $_SERVER['DOCUMENT_ROOT']  . $image_name;
    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return $image_name;
}

// function to delete a file
function deleteFile($file)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $file);
    }
}

// check get request
// return all activities from database
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // include database connection
    include_once '../../config/database.php';
    $query = "SELECT * FROM activities order by `date` desc";
    $result = $conn->query($query);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}



// check post request
// save activities to database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode($_POST['data']);

    include_once '../../config/database.php';

    $id = $data->activityId;
    if (isset($data->action) && $data->action == 'delete') {
        $query = "SELECT imgUrl FROM activities WHERE id = '$id'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $imgUrl = $row['imgUrl'];
        $arr = array();
        $query = "DELETE FROM activities WHERE id = '$id'";
        if ($conn->query($query) === true) {
            deleteFile($imgUrl);
            $arr['imageDeleted'] = 'true';
            $arr["success"] = true;
        } else {
            $arr["success"] = false;
        }
        echo json_encode($arr);
        $conn->close();
        return;
    }

    $imgUrl = '';
    if ($data->activityImageChanged == 'true' && $id != '') {
        $query = "SELECT imgUrl FROM activities WHERE id = '$id'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $imgUrl = $row['imgUrl'];
    }
    if ($data->activityImageChanged == 'true')
        $imgUrl = base64_to_image($data->activityImage, $imgUrl);
    else
        $imgUrl = $data->activityImage;

    if ($id == '') {
        $query = "insert into activities (imgUrl,title, description, date, category) values('" . mysqli_real_escape_string($conn, $imgUrl) . "','" . ucwords($data->activityTitle) . "', '$data->activityDescription', '$data->activityDate', '" . ucwords($data->activityCategory) . "')";
        if ($conn->query($query) === true) {
            $max = $conn->query("select max(id) from activities");
            $arr = array();
            $arr["id"] = $max->fetch_row()[0];
            $arr["success"] = true;
            echo json_encode($arr);
        } else {
            $arr = array();
            $arr["success"] = false;
            echo json_encode($arr);
        }
    } else {
        if ($data->activityImageChanged == 'true') {
            // get image address from database add delete it

            $query = "UPDATE activities SET imgUrl='" . mysqli_real_escape_string($conn, $imgUrl) . "', title = '" . ucwords($data->activityTitle) . "', description= '$data->activityDescription', date= '$data->activityDate', category= '" . ucwords($data->activityCategory) . "' WHERE id = '$id'";
        } else
            $query = "UPDATE activities SET title = '" . ucwords($data->activityTitle) . "', description= '$data->activityDescription', date= '$data->activityDate', category= '" . ucwords($data->activityCategory) . "' WHERE id = '$id'";
        if ($conn->query($query) === true) {
            $arr = array();
            $arr["id"] = $id;
            $arr["success"] = true;
            echo json_encode($arr);
        } else {
            $arr = array();
            $arr["success"] = false;
            echo json_encode($arr);
        }
    }

    $conn->close();
}
