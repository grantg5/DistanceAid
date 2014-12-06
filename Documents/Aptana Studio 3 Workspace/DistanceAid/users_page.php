<?php include "base.php"; ?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>User's Page</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css"></link>
        <style>
            html {
                float: none;
            }
        </style>
    </head>

    <body>
        <?php
        include "header.php";
        if (empty($_SESSION['Username'])) {
            if (!empty($_POST['userIn']) && !empty($_POST['passwordIn'])) {
                $username = mysqli_real_escape_string($connection, $_POST['userIn']);
                $password = md5(mysqli_real_escape_string($connection, $_POST['passwordIn']));

                $checkLogin = mysqli_query($connection, "SELECT * FROM Users WHERE username = '" . $username . "' AND password = '" . $password . "'") or die("Error: " . mysqli_error($connection));

                if (mysqli_num_rows($checkLogin) == 1) {
                    $row = mysqli_fetch_array($checkLogin);
                    $points = $row['points'];

                    $_SESSION['Username'] = $username;
                    $_SESSION['Points'] = $points;
                    $_SESSION['LoggedIn'] = 1;

                    echo('<meta http-equiv="refresh" content="0; url=http://distanceaid.comuv.com/">');
                } 
                else {
                    echo "Sorry, could not log you in, please ensure your information is correct</br>";
                    echo '<a href="login.php">Go Back</a>';
                }
            } else {
                echo "Please Fill out both fields</br>";
                echo '<a href="login.php">Go Back</a>';
            }
        } else {
            $unlocked = array();
            $count = 0;
            $get_unlocked = mysqli_query($connection, "SELECT * FROM Achievements_Unlocked WHERE username = '" . $_SESSION['Username'] . "'") or die("Get: " . mysqli_error($connection));
            while ($row = mysqli_fetch_object($get_unlocked)) {
                $unlocked[$count] = $row;
                $count += 1;
            }

            $all_achivements = array();
            $all_count = 0;
            $get_all = mysqli_query($connection, "SELECT * FROM Achivements");
            while ($row = mysqli_fetch_object($get_all)) {
                $all_achivements[$all_count] = $row;
                $all_count += 1;
            }

            $not_unlocked = array();
            $not_count = 0;
            foreach ($all_achivements as $x) {
                $in = false;
                foreach ($unlocked as $y) {
                    if ($x->name == $y->achievement) {
                        $in = true;
                        break;
                    }
                }
                if ($in == false) {
                    $not_unlocked[$not_count] = $x;
                    $not_count += 1;
                }
            }
            ?>
            <div class="row">
                <h2 style='margin: auto; text-align: center; width: 500px;'>Your Page</h2><br>
            </div>

            <div class="row">
                <div style="margin-left: auto; margin-right: auto; margin-top: 40px; text-align: center; width: 500px;"><h4>Total Points: </h4><?php echo($_SESSION['Points']); ?></div>
            </div>

            <div class="row">
                <h4 style="margin-left: auto; margin-right: auto; margin-top: 20px; text-align: center; width: 500px;">Achievements Unlocked</h4><br>
            </div>

            <div class="row">
                <table class="table" style="margin-left: auto; margin-right: auto; margin-top: 5px; width: 500px;">
                    <tbody>
                        <?php
                        foreach ($unlocked as $x) {
                            echo('<tr>');
                            echo('<td>' . $x->achievement.'</td>');
                            echo('<td>' . $x->points.'</td>');
                            echo('</tr>');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <h4 style="margin-left: auto; margin-right: auto; margin-top: 20px; text-align: center; width: 500px;">Achievements to Unlock</h4><br>
            </div>
            <div class="row">
                <table class="table" style="margin-left: auto; margin-right: auto; margin-top: 5px; width: 500px;">
                    <tbody>
                        <?php
                        foreach ($not_unlocked as $x) {
                            echo('<tr>');
                            echo('<td>' . $x->name . '</td>');
                            echo('<td>' . $x->description . '</td>');
                            echo('<td>' . $x->points . '</td>');
                            echo('</tr>');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php }
        ?>
    </body>
</html>
