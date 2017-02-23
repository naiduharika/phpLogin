<?php
session_start();
ob_start();

if (isset($_SESSION['Username']))
{
	echo "Welcome " . $_SESSION['Username']. "!<br><br>";
}
else
{
	echo "Session variables not set. <br>";
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<style type="text/css">
		body{
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
		}
	</style>
</head>
<body>
	<a href="lab6_login.php">Home</a> &nbsp;&nbsp;&nbsp;
	<a href="lab6_logoff.php">Logoff</a> <br>
</body>
</html>


