<?php
require 'connection.php';
    $id =$_POST['teamIdN'];
    $totalMatches = $_POST['totalMatches']; 
    if ($totalMatches > 0) {
        $error_msg = "команда участвует в турнире, ее нельзя удалить";
    }else {
    $sql = "DELETE FROM Teams WHERE id = $id";
    }
    
    $res = mysqli_query($conn, $sql);
    echo $res ? 1 : $error_msg;
    exit();
    
