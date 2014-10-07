<?php include 'base.php'; ?>

<!--Send email to my email address (or website email)-->
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Suggestions/Comments</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <form method="post" action="suggestionpost.php" style="width: 400px; margin: auto;">
            <div class ="row">
                <div class="span12" style="margin-left: auto; margin-right: auto; margin-top: 50px;">
                    Enter Your Suggested Name<br>
                    <input type="text" name="nameIn" id="nameIn" style="margin-bottom: 30px; margin-top: 10px;">
                </div>
            </div>
            <div class="row">
                <div class="span12" style="margin-left: auto; margin-right: auto;">
                    Enter a Brief Description of your Suggested Activity<br>
                        <textArea lines="8" cols="50" style="width: 400px; height: 200px; margin-top: 10px;" name="descriptIn" id="descriptIn"></textArea>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <input type="submit" value="Submit" class="btn" style="margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </form>
    </body>
</html>