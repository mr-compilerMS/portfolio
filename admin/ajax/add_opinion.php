<?php
include '../../config/fieldvalues.php';

// remove leading data from base64 string

// get image extension from base64 string and generate unique file name

// write function to convert image from base 64 to file and save it to the server and return the file name
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

    // instantiate database and product object // get posted data
    $name = $_POST['name'];
    $opinion = $_POST['opinion'];
    $image = $_POST['imgUrl'];
    // make sure data is not empty
    if (
        !empty($name) &&
        !empty($opinion)
    ) {
        // convert base 64 to image from data
        $imgUrl = base64_to_image($image);
        // set product property values
        $name = $name;
        $opinion = $opinion;

        // create the product
        $query = "insert into opinions (imgUrl,name, opinion) values('" . mysqli_real_escape_string($conn, $imgUrl) . "','$name', '$opinion')";

        // execute query
        if ($conn->query($query) === true) {
            $max = $conn->query("select max(id) from opinions");
            echo $max->fetch_row()[0];
        } else {
            echo "alert('Error: " . "<br>" . $conn->error . "');";
        }
    } else
        echo "alert('Error: Insufficient data');";
}
