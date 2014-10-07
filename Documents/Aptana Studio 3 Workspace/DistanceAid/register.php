<?php include "base.php"; ?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Register!</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css"></link>
    </head>
    
    <body>
        <?php include "header.php";
        
        if(!empty($_POST['proposedUsername']) && !empty($_POST['proposedPassword']) && !empty($_POST['proposedPasswordAgain']) && !empty($_POST['proposedEmail'])){        
          $usernameProposed = mysqli_real_escape_string($connection, $_POST['proposedUsername']);
          $passwordProposed = md5(mysqli_real_escape_string($connection, $_POST['proposedPassword']));
          $passwordAgain = md5(mysqli_real_escape_string($connection, $_POST['proposedPasswordAgain']));
          $emailProposed = mysqli_real_escape_string($connection, $_POST['proposedEmail']);
          $initialPoints = 0;
                    
          if ($passwordProposed == $passwordAgain){
              //Error in usernameCheck query, can't figure out why...
              $usernameCheck = mysqli_query($connection, "SELECT * FROM Users WHERE username = '".$usernameProposed."'") or die("Query Error: ". mysqli_error($connection)."usernameCheck: ".$usernameCheck);
              
              if (mysqli_num_rows($usernameCheck) == 1){
                  echo "<p color='red'>Sorry, Username already taken, try a diffrent one</p>";
              }
            
              else {
                  $registerQuery = mysqli_query($connection, "INSERT INTO Users (username, password, points, email) VALUES('".$usernameProposed."', '".$passwordProposed."', '".$initialPoints."', '".$emailProposed."')");
                  if ($registerQuery){
                      echo("<h2 align='center'>Success! Welcome to the Club</h2>");
                      echo("<p align='center'>Now, try logging in using the form in the Navbar</p>");
                  }
                
                  else {
                      echo("<h2 align='center'>Oops! Something went wrong, please try again</h2>");
                  }
              }
          }
          
          else {
            echo "<p color='red'> Sorry, your passwords do not match, please try again</p>";
          }
        }
        
        else{
        ?>    
            <h1 align="center">Join the Club!</h1>
        
            <form class="form-actions" action="register.php" method="post" name="registerForm">
                <p>Username: <input type="text" name="proposedUsername" id="proposedUsername"></br></p>
                <p>Password: <input type="password" name="proposedPassword" id="proposedPassword"></br></p>
                <p>Password Again: <input type="password" name="proposedPasswordAgain" id="proposedPasswordAgain"></br></p>
                <p>Email: <input type="text" name="proposedEmail" id="proposedEmail"></br></p>
                <input type="submit" value="Register!" class="btn">
            </form>   
        <?php
        }
        ?>
    </body>
    
</html>