<?php
require 'connection.php';
$team = $_POST['team'];
if ($team == null) {
    $error_msg =  "необходимо указать название команды";
} else {
    $sql = "INSERT INTO Teams (team) VALUES ('$team')";
}
$res = mysqli_query($conn, $sql);
echo $res ? 1 : $error_msg;
exit();
