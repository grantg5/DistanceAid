<?php include 'base.php'; ?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>All Activities</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <?php include 'header.php'; ?>
    <table class="table">
        <thead><tr><td><h3>All Activities</h3></td></tr></thead>
        <tbody>
            <form action="addNumber.php" method="post">
            <?php
                $allActivities = mysqli_query($connection, "SELECT * FROM Activities");
                $objects = array();
                $count = 0;

                while($row = mysqli_fetch_object($allActivities)){
                    $objects[$count] = $row;
                    $count += 1;
                }

                foreach ($objects as $x){ 
                    $buttonValue = $x->points;
                    echo ("<tr>");
                        echo ("<td>".$x->name.'</td>');
                        echo ("<td>".$x->description.'</td>');
                        echo ('<td><input type="submit" class="btn-success" name="button" value="Did It for '.$buttonValue.' Points!"></input></td>');
                    echo ("</tr>");
                }
            ?>
            </form>
        </tbody>
    </table>
</html>
