<?php
$dbservername = "localhost";
$dbuser = "root";
$dbpassword = "root";
$dbname = "PointTable";
$conn = mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);
if (!$conn) {
    die("no connection");
}
