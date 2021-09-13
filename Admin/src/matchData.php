<?php
require 'connection.php';
$date = $_POST['date'];
$teamA = $_POST['teamA'];
$teamB = $_POST['teamB'];
$firstTeamId = $_POST['firstTeamId'];
$secondTeamId = $_POST['secondTeamId'];
$firstTeamGoal = $_POST['firstTeamGoal'];
$secondTeamGoal = $_POST['secondTeamGoal'];
$difference = $_POST['goalDiff'];
$firstTeamPoint = $_POST['firstTeamPoint'];
$secondTeamPoint = $_POST['secondTeamPoint'];

if ( $date  == null) {
    $error_msg = "необходимо заполнить дату";
}
else if ($teamA  == $teamB) {
    $error_msg = "teams should be different";
} 
else if ($firstTeamGoal  == null or $secondTeamGoal  == null) {
    $error_msg = "необходимо заполнить количество голов";
} 
else if ($firstTeamGoal  < 0 or $secondTeamGoal < 0) {
    $error_msg = "значение должно быть положительным";
}
else{
    $sql = "UPDATE Teams SET  hasGoal = hasGoal+'$firstTeamGoal'  , missingGoal = missingGoal + '$secondTeamGoal',goalDifference = goalDifference + '$difference' , points = points + $firstTeamPoint , numOfMatches = numOfMatches + 1  WHERE id =$firstTeamId;";
    $sql .= "UPDATE Teams SET  hasGoal = hasGoal+'$secondTeamGoal'  , missingGoal = missingGoal + '$firstTeamGoal',goalDifference = goalDifference - '$difference' , points = points + $secondTeamPoint , numOfMatches = numOfMatches + 1  WHERE id =$secondTeamId;";
    $sql .= "INSERT INTO matchDescription  (teamA,teamB,teamAGoal,teamBGoal,matchDate) VALUES ('$teamA','$teamB','$firstTeamGoal','$secondTeamGoal','$date');";
}

$res = mysqli_multi_query($conn, $sql);
echo $res ? 1 : $error_msg;

