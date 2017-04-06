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
	$connection = pg_connect("host=ec2-23-23-223-2.compute-1.amazonaws.com dbname=d1filjgshltm5 user=mtracxsevywyhp password=d1950f8ce89de40987a180f56de2bc99250da5810e346b57e6bdf5e957c18c3c")
    or die('Could not connect: ' . pg_last_error());
			
		// SQL query to fetch information of registerd users and finds user match.
	$query = 'Select * from admin_user where admin_user."Username" = \''.$username.'\' and admin_user."Password" = \''.$password.'\'';
	
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	
		$rows = pg_num_rows($result);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: profile.php"); // Redirecting To Other Page
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
