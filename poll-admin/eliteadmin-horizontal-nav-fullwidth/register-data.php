<?php
if (isset ($_POST['submit'])) {
	
	// Define $username and $password
	$new_name= pg_escape_string($_POST['full_name']);
	$new_user= pg_escape_string($_POST['reg_user']);
	$new_email= pg_escape_string($_POST['reg_email']);
	$new_pass= pg_escape_string($_POST['reg_pass']);
	
	// Connecting, selecting database
	include 'config.php';	

	// SQL query to fetch information of registerd users and finds user match.
	$sql = 'INSERT INTO admin_user ("Username", "Password", "Email", "Name") VALUES (\''.$new_user.'\',\''.$new_pass.'\', \''.$new_email.'\', \''.$new_name.'\')';
	
	$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

	if ($result)
	{	
		echo '<script type="text/javascript">'; 
		echo 'alert("Registration Successfully");'; 
		echo 'window.location.href = "http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/";';
		echo '</script>';	
	}
	// Free resultset
	pg_free_result($result);
	
	// Closing connection
	pg_close($connection);

}
?>
