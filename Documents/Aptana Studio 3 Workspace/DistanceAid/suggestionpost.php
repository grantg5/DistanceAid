<?php include 'base.php'; ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Suggestions/Comments</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
        <?php include 'header.php'; 
            $to = "grant.gadomski@gmail.com";
            $from = "DistanceAid";
            $message = $_POST['descriptIn'];
            $subject = $_POST['nameIn'];
            $header = "From: ".$from;
            mail($to, $subject, $message, $header);
        ?>
        <div class="row">
            <div class="span12">
                <h3 style="margin-left: auto; margin-right: auto; margin-top: 75px; text-align: center;">Thank You for Making the World a Better Place</h3>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <p style="margin-left: auto; margin-right: auto; margin-top: 50px; text-align: center;">
                    Your suggestion has been sent to the resident Beagle in Charge for review.
                    <!--Pop in pic of Rexy-->
                </p>
            </div>
        </div>
    </body>
</html>
