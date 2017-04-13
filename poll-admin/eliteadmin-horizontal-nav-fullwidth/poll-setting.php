<?php
include('session.php');

include ('config.php');	

if(isset($_POST['submit_image'])){
	
	$poll_id = pg_escape_string($_GET['id']);
	
	// Poll Logo Upload and Show
	$uploaddir = '../poll-logo/';
	$uploadfile = $uploaddir . basename($_FILES['myimage']['name']);	
	
	if (move_uploaded_file($_FILES['myimage']['tmp_name'], $uploadfile))
	{    
		//echo "File is valid, and was successfully uploaded.\n"; 
	}
	else   {   echo "File size greater than 300kb!\n\n";   }	

	// Checking exiting Record 	
	$select = 'SELECT * from poll_setting where poll_setting."poll_id" = \''.$poll_id.'\'';
	$select_result = pg_query($select) or die('Query failed: ' . pg_last_error());
	
	$rows = pg_num_rows($select_result);
	
	if ($rows == 1) {
		// Update Exiting Poll Logo
		$update = 'UPDATE poll_setting SET "poll_id"= \''.$poll_id.'\', "logo_path"= \''.$uploadfile.'\' where poll_setting."poll_id" = \''.$poll_id.'\'';	
		
		$update_result = pg_query($sql) or die('Query failed: ' . pg_last_error());
	
	} 
	else {
		// Insert New Poll Logo
		$insert = 'INSERT INTO poll_setting ("poll_id","logo_path") VALUES (\''.$poll_id.'\',\''.$uploadfile.'\')';
		$insert_result = pg_query($sql) or die('Query failed: ' . pg_last_error());
	}
}
?> 
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Poll Setting</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
<?php
include('nav.php');

include('left-sidebar.php');
?>
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4 class="page-title"> </h4>
        </div>
		<div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
			<!-- Logo Upload -->
			<form method="POST" action="" enctype="multipart/form-data">
				 <input type="file" name="myimage">
				 <input type="submit" name="submit_image" value="Upload">
			</form>
			
			<div id="show-image">
			<?php 
				$poll_id = pg_escape_string($_GET['id']);
				
				$sql = 'SELECT * from poll_setting where poll_setting."poll_id" = \''.$poll_id.'\'';
				
				$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
				
				while ($row = pg_fetch_array($result)) {	
					$image_path=$row["logo_path"];	
					echo "<img src=".$image_path." width=100 height=100/>";		
				}			
			?>
			</div>

		</div>
<?php include('right-sidebar.php');?>

      </div>
		
		
      </div>
   
    <footer class="footer text-center"> 2017 &copy; Poll Voting Admin Interface </footer>
  </div>
  <!-- /#page-wrapper -->
</div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Counter js -->
<script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="../plugins/bower_components/raphael/raphael-min.js"></script>
<script src="../plugins/bower_components/morrisjs/morris.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<script src="js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
