<?php include 'base.php';
    //Adding points recieved on completion to account in database, reseting the session variable to new point value
    $currentUser = $_SESSION['Username'];
    $pointsToAddString = $_POST['button'];
  
    preg_match('!\d+!', $pointsToAddString, $pointsToAddArray);
    $pointsToAdd = intval($pointsToAddArray[0]);
    
    $outQuery = mysqli_query($connection, "SELECT points FROM Users WHERE username = '".$currentUser."'") or die("outquery error: ".mysqli_error($connection));
    $currentPointsGet = mysqli_fetch_array($outQuery);
    $currentPoints = $currentPointsGet[0];
    $newPoints = $currentPoints + $pointsToAdd;
    
    $inQuery = mysqli_query($connection, "UPDATE Users SET points = '".$newPoints."' WHERE username = '".$currentUser."'") or die("in error: ".mysqli_error($connection));
    $_SESSION['Points'] = $newPoints;
    
    $unlocked = array();
    $count = 0;
    
    $unlocked_query = mysqli_query($connection, "SELECT * FROM Achievements_Unlocked WHERE username = '".$currentUser."'") or die("Unlocked: ".  mysqli_error($connection));
    while ($row = mysqli_fetch_object($unlocked_query)){
        $unlocked[$count] = $row;
        $count += 1;
    }
    
    $achivements = array();
    $achive_count = 0;
    
    $achive_query = mysqli_query($connection, "SELECT * FROM Achivements");
    while ($row = mysqli_fetch_object($achive_query)){
        $achivements[$achive_count] = $row;
        $achive_count += 1;
    }

    foreach ($achivements as $x){
        if($newPoints >= $x->required){
            $in = false;
            foreach($unlocked as $y){
                if($y->achievement == $x->name && $y->username == $currentUser){
                    $in = true;
                    break;
                }
            }
            if($in == false){
                $a_name = $x->name;
                $a_points = $x->points;
                $update_unlocked = mysqli_query($connection, "INSERT INTO Achievements_Unlocked(username, achievement, points) VALUES ('".
                                                $currentUser."', '".$a_name."', '".$a_points."')") or die("update: ".mysqli_error($connection));
                
                $achive_points = $newPoints + $x->points;
                $update_points = mysqli_query($connection, "UPDATE Users SET points = '".$achive_points."' WHERE username = '".$currentUser."'");
                $_SESSION['Points'] = $achive_points;
            }
        }
    }
?>

<meta http-equiv="refresh" content="0; url=http://distanceaid.comuv.com/index.php">
