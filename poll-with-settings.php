<?php
include 'config.php';

	$p_id= 1;
	
	$query = 'SELECT * from poll_setting where poll_setting."Poll_id" = \''.$p_id.'\'';
	
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());	
	
	// output data of each row
	while($row = pg_fetch_array($result)) {
		$id= $row["Poll_id"];
		$a= $row["Logo_Path"];
		$b= $row["Poll_Title"];
		$c= $row["Page_Bg_Color"];
		$d= $row["Poll_Bg_Color"];
		$e= $row["Poll_Title_Color"];
		$f= $row["Poll_Item_Color"];
		$g= $row["Description_Color"];
		$h= $row["Count_BG_Color"];
		$i= $row["Count_Text_Color"];		
		$j= $row["Status_Option"];		
		$k= $row["Custom_Javascript"];	
		$l= $row["Active_Count_BG"];
		$m= $row["User_Request"];		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vote System</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="myvote.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="jquery.twbsPagination.js"></script>
<style type="text/css">
#show-image {
    float: left;
}
#poll_status {
    color: #fff;
    float: right;
}
.total.toggled {
    background: <?php echo($l);?>!important;
    border-color: <?php echo($l);?>!important;;
}
#suggestion_form {
    background: #d9edf7 none repeat scroll 0 0;
    padding: 0 10px 10px;
}
</style>
<script type="text/javascript">
<?php echo $k; ?>;
$(document).ready(function() {
	var my_req = <?php echo $m; ?>;
	alert (my_req);
	alert ('Work');
});
</script>
</head>
<body style="background-color:<?php echo($c);?>!important;">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main">
		<div class="container">
			<!-- Show Logo -->
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div id="show-image">
					<img src="images\Shopified_App_Logo.png" style="width: 100%;">
					<!--img src="http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/<!?php echo ($a); ?>" style="width: 100%;"-->
				</div>	
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div id="poll_status">
					<h3></h3>
				</div>
			</div>
			<!-- Suggestion Form -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="suggestion_form" >
				<form>
					<h2>Post Your Suggestion Here : </h2>
					<div class="form-group">
					  <input type="text" class="form-control" required id="" placeholder="Item Title">
					</div>
					<div class="form-group">
					  <input type="text" class="form-control" required id="" placeholder="Item Description">
					</div>
					<center><button type="submit" class="btn btn-default">Make Suggestion</button></center>
				</form>
			</div>			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="heading">
					<h1 style="color:<?php echo ($e);?>;"><?php echo ($b);?></h1>
				</div>
			</div>	
			<div style="background-color:<?php echo($d);?>!important;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_main">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
<?php
include 'config.php';

$poll= 1;
	
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
						<div class="total" style="background-color:<?php echo($h);?>;">
							<span class="icon"><img src="images\arrow.png"> </span>
							<span class="number" id="<?php echo $row['Id']?>" style="color:<?php echo ($i);?>;"><?php echo $row['Count_num'];?></span>
						</div>
					</div>
					<div class="list_innr">
						<h2 style="color:<?php echo ($f);?>;"><?php echo $row['Question']?></h2>
						<p style="color:<?php echo ($g);?>;"><?php echo $row['Quest_Desc']?></p>
					</div>	
				</div>
<?php
}
// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
				<center><ul id="pagination-demo" class="pagination-lg"></ul></center>
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
