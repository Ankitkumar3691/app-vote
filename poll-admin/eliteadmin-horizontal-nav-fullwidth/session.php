<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = pg_connect("host=ec2-23-23-223-2.compute-1.amazonaws.com dbname=d1filjgshltm5 user=mtracxsevywyhp password=d1950f8ce89de40987a180f56de2bc99250da5810e346b57e6bdf5e957c18c3c")
    or die('Could not connect: ' . pg_last_error());

// Starting Session
session_start();

// Storing Session
$user_check= $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$query = 'SELECT admin_user."Username" from admin_user where admin_user."Username" = \''.$user_check.'\'';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

$rows = pg_num_rows($result);

$login_session =$row['username'];

if(!isset($login_session)){
	mysql_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>
