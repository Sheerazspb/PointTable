<?php
require '../admin/src/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Admin/style.css">
    <title>Point Table</title>

    <table class="main-table">
        <tr>
            <th>№</th>
            <th>Положение команд</th>
            <th>Игры</th>
            <th>Мячи</th>
            <th>Очки</th>
        </tr>
        
        <?php
        $sql = "select * from `teams` order by `points`  desc,`hasGoal` desc,`goalDifference`desc";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $counter = 1;
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
               <tr>
                    <td><?= $counter ?></td>
                    <td><?= $row['team'] ?></td>
                    <td><?= $row['numOfMatches'] ?></td>
                    <td><?= $row['hasGoal'] ?>/<?= $row['missingGoal'] ?></td>
                    <td><?= $row['points'] ?></td>
                </tr>
        <?php
                $counter++;
            }
        }
    ?>
</table>
</head>
</html>