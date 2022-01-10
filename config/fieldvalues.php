<?php
include "database.php";

$sql = "SELECT * FROM `fieldvalues`";
$result = $conn->query($sql);
if (!isset($result) || !isset($result->num_rows)) return;

$fieldvalues = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $fieldvalues[$row["id"]] = $row["value"];
    }
}

$sql = "SELECT * FROM `imgurls`";
$result = $conn->query($sql);
if (!isset($result) || !isset($result->num_rows)) return;
$imgurls = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imgurls[$row["id"]] = $row["url"];
    }
}

function url()
{
    return sprintf(
        "%s://%s:%s/%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['SERVER_PORT'],
        $_SERVER['SERVER_PORT'] != '80' ? '' : 'portfolio/'
    );
}
