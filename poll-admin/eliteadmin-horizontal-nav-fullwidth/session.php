<?php
include ('config.php');	

// Starting Session
session_start();

// Storing Session
$user_check= $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
//$ses_sql=mysql_query("select username from admin_user where Username='$user_check'", $connection);
//$row = mysql_fetch_assoc($ses_sql);

$query = 'SELECT admin_user."Username" from admin_user where admin_user."Username" = \''.$user_check.'\'';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

$row = pg_numrows($result);

$login_session = $row['Username'];

if(!isset($login_session)){
	pg_close($connection);
	header('Location: index.php'); // Redirecting To Home Page
}
?>
