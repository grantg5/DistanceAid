<?php
    session_start();
	
    $dbhost = "mysql6.000webhost.com";
    $dbname = "a8019072_users";
    $dbuser = "a8019072_admin";
    $dbpassword = "*******"; //Email me for the database password.
	
    $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("base Error: ".mysqli_error($connection));
?>
