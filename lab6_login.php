<?php
session_start();
$_SESSION = array();
session_unset();
ob_start(); // Turn on output buffering

$error = "";
	if (isset($_POST["submit"]))
	{
		$user_name = trim($_POST["UName"]);
		$password = $_POST["pswd"];

		echo "<center>" .$user_name. ":". $password."</center><br>" ;

		$message = "Logging in {$user_name} <br>";

		if ((strcasecmp($user_name, "hnaidu") == 0) && $password === "Secret")
		{	
			header('Location:lab6_login_success.php');
		}
		else if (!$user_name || !$password)
		{
			$error = "Please enter UserName and Password to login";
		}
		else 
		{
			$error = "User Name: <u>" .$user_name. "</u> and <u>" .$password. "</u> don't match";
		}
	}
	else
	{
		$user_name = "";
		$message = "Please log in.<br>";
	}
?>
<!--Remember Username and Password: Creat Cookies-->
<?php
	if (isset($_POST['remPasnUN']))
	{
		if ((strcasecmp($user_name, "hnaidu") == 0) && $password === "Secret")
		{
			setcookie("username", "hnaidu", time()+60*60*24*7);
			setcookie("password", "Secret", time()+60*60*24*7);
		}
		else
		{
			$error = "User Name: <u>" .$user_name. "</u> and <u>" .$password. "</u> don't match";
		}
	}
?>

<!--Clear cookies for UserName and Password-->
<?php
	if (isset($_POST['clearcookie']))
	{
		setcookie("username","", time()-60*60*24);
		unset ($_COOKIE['username']);
		setcookie("password","", time()-60*60*24);
		unset ($_COOKIE['password']);
	}
?>

<!--Set session variables-->
<?php
	$_SESSION['Username'] = "hnaidu";
	$_SESSION['password'] = "Secret";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		body{
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
		}
		h1, h2{
			color: #DC143C;
			text-align: center;
			font-variant: small-caps;
		}
		div.form
		{
		    display: block;
		    text-align: center;
		}
		form
		{
		    display: inline-block;
		    margin-left: auto;
		    margin-right: auto;
		    text-align: left;
		}
		button {
		    background-color: #DC143C;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    cursor: pointer;
		    width: 100%;
		    text-align: center;
		}
		</style>
</head>
<body>
<br>
	<h1> Welcome to Harika's Bookstore! </h1>
	<div class="form">
	<form action="lab6_login.php" method="post" name="Login">
	<p> Valid User Name: <u>hnaidu</u></p>
	<p> Valid Password: <u>Secret</u></p>
		<table>
			<tr>
				<td><lable><b>User Name: </b></lable></td>
			</tr>
			<tr>
				<td> <input type="text" name="UName" size="50" value="<?php if(isset($_COOKIE['username']))
			echo $_COOKIE['username']; ?>" /></td>
			</tr>
			<tr>
				<td><label><b>Password: </b></label></td>
			</tr>
			<tr>
				<td> <input type="password" name="pswd" size="50" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" /></td>
			</tr>
			<tr>
				<td> <button type="submit" name="submit">Login</button></td>
			</tr>
			<tr>
				<td> <input type="checkbox" name="remPasnUN">
						Remember me
				</td>
			</tr>
			<tr>
				<td> <input type="checkbox" name="clearcookie">
						Clear cookies for UserName and Password
				</td>
			</tr>
		</table>

	</form>
	<article>
	<br>
	<?php
	//display login message
		echo "<span style = 'color:blue'> *";
		echo $message; 
		echo "<br></span>";
	if($error)
	{ //diplay errors
		echo "<span style = 'color:green'> * ";
 		echo $error;
 		echo "</span>";	
 	}
	?>
	</article>
	<br>
	<hr>
	<hr>
	<h2>Student Oath</h2>
	<p>I declare that the attached assignment is wholly my own work in accordance with Seneca Academic Policy. No part of this assignment has been copied manually or electronically from any other source (including web sites) or distributed to other students.
	<br><br>Name: <u>  Harika Naidu  </u> Student ID: <u>  011198090  </u></p>
	</div>
</body>
</html>
<?php
ob_end_flush(); // Flush (send) the output buffer and turn off output buffering
?>

