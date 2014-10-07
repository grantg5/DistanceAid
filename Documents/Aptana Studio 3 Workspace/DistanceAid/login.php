<?php include 'base.php'; ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>All Activities</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="row">
            <div class="span12">
                <form action="users_page.php" method="post" style="width: 400px; margin: auto; margin-top: 20px;">
                    Username: <input type="text" name="userIn"><br>
                    Password: <input type="password" name="passwordIn"><br>
                            <input type="submit" class="btn" name="loginGo">&nbsp;&nbsp;<a href="register.php">Sign Up!</a>
                </form>
            </div>
        </div>
    </body>
</html>
