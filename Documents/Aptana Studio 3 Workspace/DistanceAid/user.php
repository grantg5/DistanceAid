//Header
<?php 
echo '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>User Page</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
	</head>
	
	<body>
	';


//Navbar	
$loggedin = TRUE;
$username = 'grantg5';
$partnersname = 'katebullet';
$totalpoints = 9000;
if ($loggedin = FALSE){
	echo 
		'
		<div class="navbar">
        	<div class="navbar-inner">
        		<ul class="nav nav-tabs">
        			<li><a href="#">About</a></li>
         		</ul> 
				<form class="navbar-search pull-right">
           			Username: <input type="text" name="userIn"><br>
           			Password: <input type="password" name="passIn">
           			<input type="submit" value="login" class="btn">
           		</form>
           	</div>
		</div>';	
}

else {
	echo 
	'
	<div class="navbar">
        	<div class="navbar-inner">
        		<ul class="nav nav-tabs">
        			<li><a href="#">About</a></li>
         			<li>Hello, ' . $username . '</li>
         		</ul>
         	</div>
    </div>
	';
}


//Hello (username)
echo ('
	<div align="center"><h2>Hello, ' . $username . '!</h2></div>');
	
echo ('
	<table class="table">
		<tbody>
			<tr>
				<td>Username: </td>
				<td>' . $username . '</td>
			</tr>
			<tr>
				<td>Partners name: </td>
				<td>' . $partnersname . '</td>
			</tr>
			<tr>
				<td>Total Points: </td>
				<td>' . $totalpoints . '</td>
			</tr>
		</tbody>
	</table>
</body>
</html>');
				
				
	
?>