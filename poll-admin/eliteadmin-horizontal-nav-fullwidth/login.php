<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message

if (isset ($_POST['submit'])) {
	
	if (empty ($_POST['username']) || empty ($_POST['password'])) {
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
	
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	
		$rows = pg_num_rows($result);
		
		if ($rows == 1) {
			$user_name= pg_escape_string($_POST['username']);
			$_SESSION['login_user'] = $user_name; // Initializing Session
			header("location: profile.php?user=$user_name"); // Redirecting To Other Page
		} 
		else {
			$error = "Username or Password is invalid";
		}

		// Free resultset
		pg_free_result($result);
		
		// Closing connection
		pg_close($connection);
	}
}
?>
