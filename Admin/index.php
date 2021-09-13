<?php
ob_start();
require 'src/login.php';
if (isset($_SESSION['logged_in'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Admin For Point Table</title>
    </head>
    <h1 class="header">POINT TABLE</h1>

    <section class="teams-container">
        <ul class="team-group">
            <?php
            $sql = "select * from Teams";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <li class="list-team">ФК «<?= $row['team'] ?>»<button name="<?php echo $row['team'] ?>" id="<?php echo $row['id'] ?>" class="trash-btn" data-="<?php echo $row['numOfMatches'] ?>"></button></li>
            <?php
                }
            }
            ?>
        </ul>

        <div class="add-team-container">
            <form action="src/addTeam.php" method="POST" accept-charset="utf-8">
                <input type="text" class="add-team-field">
                <input id="add-team" name="add-team" type="submit" value="Добавить Команду" class="add-team">
            </form>
        </div>
    </section>
    <section class="points-container">
        <form action="src/matchData.php" method="post" accept-charset="utf-8" id="nform">
            <div class="date-container">
                <span class="match-date"> Match Date </span>
                <input type="date" name="date" required>
            </div>
            <div class="teams">
                <div class="first-team-container">
                    <select class="first-team-input" required>
                        <?php
                        $sql = "select * from Teams";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['team'] ?>
                                </option>
                        <?php  }
                        }
                        ?>
                    </select>
                    <input id="teamA" type="text" class="goals">
                </div>
                <div class="teams-center-column">
                    <span class="against">VS</span>
                    <span class="dots">:</span>
                </div>
                <div class="second-team-container">

                    <select class="second-team-input"  required>
                        <?php
                        $sql = "select * from Teams";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['team'] ?>
                                </option>
                        <?php  }
                        }
                        ?>
                    </select>
                    <input id="teamB" type="text" class="goals">
                </div>
            </div>
            <div class="submit">
                <input id="submit-field" type="submit" value="Добавить" class="submit-field">
            </div>
        </form>
    </section>
    <section class="match-description">
            <?php
            $sql = "select * from matchDescription";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <p class="description"><span class="match-info"><?= $row['matchDate'] ?></span> ФК «<span class="match-info"><?= $row['teamA'] ?></span>» сыграл с ФК «<span class="match-info"><?= $row['teamB'] ?></span>» со счётом <span class="match-info"><?= $row['teamAGoal'] ?></span> : <span class="match-info"><?= $row['teamBGoal'] ?></span>.</p>
            <?php  }
            }
            ?>
        </section>
    <script src="jquery-3.5.1.js"></script>
    <script src="script.js"></script>
    </body>
    </html>
<?php
} else {
    header("Location: login.html ");
}
?>