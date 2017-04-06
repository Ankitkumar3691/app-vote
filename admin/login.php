<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message

if (isset(pg_escape_string($_POST['submit']))) {
	
	if (empty(pg_escape_string($_POST['username'])) || empty(pg_escape_string($_POST['password']))) {
		$error = "Username or Password invalid";
	}
	else
	{
		// Define $username and $password
		$username= pg_escape_string($_POST['username']);
		$password= pg_escape_string($_POST['password']);
		
		// Connecting, selecting database
		include 'config.php';
			
		// SQL query to fetch information of registerd users and finds user match.
	$query = 'Select * from admin_user where admin_user."Username" = \''.$username.'\' and admin_user."Password" = \''.$password.'\'';
	
		$rows = pg_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: profile.php"); // Redirecting To Other Page
		} 
		else {
			$error = "Username or Password is invalid";
		}
		// Closing connection
		pg_close($connection);
	}
}
?>
