<html>
	<!--Put this and createaccount.php on site, change createaccount.php to .html-->
	<head>
		<title>Creation Test</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
	</head>
	
	<body>
		<div class="navbar">
        	<div class="navbar-inner">
        		<h1>DistanceAid</h1>
               	<form class="navbar-search pull-right">
           			Username: <input type="text" name="userIn"><br>
           			Password: <input type="password" name="passwordIn">
           			<input type="submit" value="login" class="btn">
           		</form>
        	</div>
        </div>
        
		<div align="center">
		<h2>Account Created, Thank You!</h2>
		</div>
		
		
		<p>
		<?php
			//Gets info from form
			$nameIn = $_POST["useIn"];
			$passIn = $_POST["passIn"];
			$passAgain = $_POST["passAgain"];
			$emailIn = $_POST["emailIn"];
			$startingPoints = 0;
	
			if (($passIn != $passAgain) || ($passIn || $passAgain == "")){
				echo ("Passwords do not match");
				//Figure out how to go back to form page if no match
			}
			else {
				//connect to database, Insert new colum with input
				$con = mysqli_connect("mysql16.000webhost.com", "a8019072_grantg5", "superrex25", "a8019072_Users") or die(mysqli_error());
				//Looking up to make sure username is not already used
				$fetch = ("SELECT username FROM Users WHERE username='$nameIn'");
				$result = mysqli_query($fetch) or die(mysqli_error());
				$num_rows = mysqli_num_rows($result);
				
				if ($num_rows > 0){
					echo ("Username already used, try a diffrent one");
				}
				else {
					//Adds username, password, etc. to database	
					mysqli_query("INSERT INTO Users (username, password, points, email) VALUES ('$nameIn', '$passIn', $startingPoints, '$emailIn')") or die(mysqli_error());
					echo ("Success!");
					
					$_SESSION['userId'] = '0';
				}
			}
		?>
		</p>
	</body>
</html>