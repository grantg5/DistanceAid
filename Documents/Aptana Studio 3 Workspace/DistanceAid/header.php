<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav">
                <li><a class="brand" href="http://distanceaid.comuv.com/index.php" style="text-decoration: none;"><h2 style="color: #3297FD;">DistanceAid</h2></a></li>
                <?php
                if (!empty($_SESSION['Username'])){ ?>
                    <li><a href="users_page.php" style="padding-top: 35px;">Go To Your Page</a></li>
                <?php }
                ?>
                <li><a href="allactivities.php" style="padding-top: 35px;">All Activities</a></li>
                <li><a href="suggestion.php" style="padding-top: 35px;">Make a Suggestion</a></li>
 
                <?php
                if (!empty($_SESSION['Username'])){
                ?>
                    <li><h4 class="nav pull-right" style="padding-top: 35px;">Welcome <?php echo($_SESSION['Username']);?>&nbsp;&nbsp;</h4></li>
                    <li><h4 class="nav pull-right" style="padding-top: 35px;">Total Points: <?php echo($_SESSION['Points']);?>&nbsp; &nbsp;</h4></li>
                    <li><a href="logout.php"><p class="pull-right" style="color: #3297FD;">logout</p></a></li>
                <?php
                }
                else {
                ?>   
                    <li><h5 class="nav pull-right" style="padding-top: 35px;"><a href="login.php" style="margin-left: 15px;">Login</a></h5></li>
                    <li><h5 class="nav pull-right" style="padding-top: 35px;"><a href="register.php" style="margin-left: 15px;">Join</a></h5></li>
                <?php
                }
                ?>
                    
            </ul>
        </div>
    </div>
</div>
