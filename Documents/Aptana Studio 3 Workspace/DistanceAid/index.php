<?php include 'base.php'; ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Welcome to DistanceAid!</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <div align="center"><h2>Oh, hello!</h2></div>
        <div align="center"><h3>Welcome to DistanceAid!</h3></div>
        <div align="center"><p>A site devoted to providing people in long-distance relationships with ideas for staying close, even when they are physically away from each other.</p></div>
        
        <table class="table">
            <thead>
        	<tr>
                    <td><h3>Recommended Activities</h3></td>
        	</tr>
            </thead>
        	
            <tbody>
                <form action="addNumber.php" method="post">
                    <?php
                        $allActivities = mysqli_query($connection, "SELECT name, points FROM Activities");
                        $objects = array();
                        $count = 0;
                        
                        while ($row = mysqli_fetch_object($allActivities)){
                            $objects[$count] = $row;
                            $count += 1;
                        }
                        
                        $selector1 = rand(0, $count - 1);
                        $selector2 = rand(0, $count - 1);
                        while ($selector1 == $selector2){
                            $selector2 = rand(0, $count - 1);
                        }
                        $selector3 = rand(0, $count - 1);
                        while ($selector3 == $selector1 || $selector3 == $selector2){
                            $selector3 = rand(0, $count - 1);
                        }
                        
                        $selected1 = $objects[$selector1];
                        $selected2 = $objects[$selector2];
                        $selected3 = $objects[$selector3];
                        $selected = array($selected1, $selected2, $selected3);
                        
                        foreach ($selected as $x){
                            $buttonValue = $x->points;
                            echo("<tr>");
                                echo("<td>".$x->name."</td>");
                                echo('<td><input type="submit" class="btn-success" name="button" value="Did It for '.$buttonValue.' Points!"></input></td>');
                            echo("</tr>");
                        }
                    ?>
                </form>
            </tbody>
        </table>
    </body>
</html>

