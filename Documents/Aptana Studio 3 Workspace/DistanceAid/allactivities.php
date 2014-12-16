<?php include 'base.php'; ?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>All Activities</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <script src="activities_search.js"></script>
        <script src="sorttable.js"></script>
    </head>
    <?php include 'header.php'; ?>

    <h3 style="margin-left: auto; margin-right: auto; text-align: center;">Search Activities</h3></br>
    <p style="display: inline;">See all activities at this value and above:</p>
    <select id="points_dropdown" onchange="number_of_points()">
        <option value="0"></option>
        <option value="3">3</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
    </select>
    </br>
    <input type="text" id="activities_search" placeholder="Search" onkeyup="number_of_points()" />

    <h3 style="margin-left: auto; margin-right: auto; text-align: center;">All Activities</h3>
    <p style="margin-left: auto; margin-right: auto; text-align: center;">Click on the Column Names to Sort!</p>
    <table class="sortable table" id="activities_table">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Points it's Worth</th>
            <th></th>
        </thead>
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
                        echo("<td>".$buttonValue.'</td>');
                        echo ('<td><input type="submit" class="btn-success" name="button" value="Did It for '.$buttonValue.' Points!"></input></td>');
                    echo ("</tr>");
                }
            ?>
            </form>
        </tbody>
    </table>
</html>
