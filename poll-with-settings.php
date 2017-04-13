<?php
include 'config.php';

	$p_id= 2;
	
	$query = 'SELECT * from poll_setting where poll_setting."poll_id" = \''.$p_id.'\'';
	
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());	
	
	// output data of each row
	while($row = pg_fetch_array($result)) {
		$id= $row["poll_id"];
		$a= $row["logo_path"];
		$b= $row["poll_title"];
		$c= $row["page_bg"];
		$d= $row["poll_bg"];		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vote System</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
	<script type="text/javascript" src="myvote.js"></script>
</head>
<body style="background-color:<?php echo($c);?>!important;">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main">
		<div class="container">
			<!-- Show Logo -->
			<div id="show-image">
				<img src="http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/<?php echo ($a); ?>" width="100" height="100">
			</div>	
			<div class="heading">
				<h1><?php echo ($b);?></h1>
			</div>
			<div style="background-color:<?php echo($d);?>!important;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_main">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
<?php
include 'config.php';

$poll= 2;
	
$query = 'SELECT * from vote where vote."poll_id" = \''.$poll.'\' ORDER BY vote."Id"';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());	

// Printing results in HTML
while ($row = pg_fetch_array($result)) {
	//echo $row[Count_num];
	//echo '<pre>';
	//print_r ($row);


?>
				<div class="list">
					<div class="toggle">
						<div class="total">
							<span class="icon"><img src="images\arrow.png"> </span>
							<span class="number" id="<?php echo $row['Id']?>"><?php echo $row['Count_num'];?></span>
						</div>
					</div>
					<div class="list_innr">
						<h2><?php echo $row['Question']?></h2>
						<p><?php echo $row['Quest_Desc']?></p>
					</div>	
				</div>
<?php
}
// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
					<p class="email">Email:&nbsp;<a href="#">abc@gmail.com</a>&nbsp;enter your account</p>
				</div>
			</div>	
		</div>
	</div>
	<div class="footer">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main">
			<div class="container">
			<div class="col-md-4"></div>
			</div>
		</div>
	</div>
</body>
</html>
