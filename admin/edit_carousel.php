<!DOCTYPE html>
<html lang="en">
<?php
include '../config/database.php';
include('../config/fieldvalues.php');
$base_url = url();
session_start();
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: $base_url/admin/login.php");
    exit;
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Admin Portfolio</title>
    <link href="<?= $base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <script src="<?= $base_url ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/sortablejs/Sortable.min.js"></script>
    <script src="<?= $base_url ?>assets/vendor/sortablejs/jquery-sortable.js"></script>
</head>

<body>
    <?php
    // TODO : Display the carousel images in the admin page
    // TODO : Add the ability to delete images from the carousel
    // TODO : Add the ability to add images to the carousel
    // TODO : Add the ability to edit the carousel images
    // TODO : Add the ability to change the title and description of the carousel
    // TODO : Add the ability to change the order of the carousel images
    ?>

    <ul id="myList">
        <li id='a1'>Item 1</li>
        <li id='a2'>Item 2</li>
        <li id='a3'>Item 3</li>
        <li id='a4'>Item 4</li>
        <li id='a5'>Item 5</li>
        <li id='a6'>Item 6</li>
    </ul>
    <script>
        $(function() {
            $('#myList').sortable();
        });
    </script>
</body>

</html>