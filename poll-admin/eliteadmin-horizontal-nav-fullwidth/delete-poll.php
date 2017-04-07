<?php
include 'config.php';

if(isset($_GET['id']))
{
	$id= pg_escape_string($_GET['id']);
	
	$query = 'DELETE from vote where vote."Id" = \''.$id.'\'';
	
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());	
	
    if($result)
	{
		echo '<script type="text/javascript">'; 
        echo 'alert("Record delete successfully");'; 
        echo 'window.location.href = "https://poll-upvoting.herokuapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/profile.php";';
        echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
        echo 'alert("Record delete unsuccessful");'; 
        echo 'window.location.href = "https://poll-upvoting.herokuapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/profile.php";';
        echo '</script>';
	}
}
?>