<?php
session_start();
	if (isset($_SESSION['Username']))
	{
		echo "Good Bye " .$_SESSION['Username']. "...<br><br>";
		$_SESSION = array();
		session_unset();
	}
	else
	{
		echo "Session variables not set. <br>";
	}

	session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Logoff</title>
	<style type="text/css">
		body{
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
		}
	</style>
</head>
<body>
	<a href="lab6_login.php">Home</a>
</body>
</html>
