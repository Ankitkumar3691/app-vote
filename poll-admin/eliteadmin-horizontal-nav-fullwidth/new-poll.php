<?php
include('session.php');

if(isset($_POST['submit'])){
	
	$p_name= pg_escape_string($_POST['poll_name']);
	
	include 'config.php';	

	$select = 'Select * from vote_polls where vote."poll_name" = \''.$p_name.'\'';
	
	$result = pg_query($select) or die('Query failed: ' . pg_last_error());
	
	if ($row = pg_num_rows($result) == 1)
	{	
		$message = "This Question is already exist ";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		$sql = 'INSERT INTO vote_polls ("poll_name") VALUES (\''.$p_name.'\')';
		$insert_result = pg_query($sql) or die('Query failed: ' . pg_last_error());	
		if ($insert_result)
		{	
			echo '<script type="text/javascript">'; 
			echo 'alert("New Poll Created successfully");'; 
			echo 'window.location.href = "http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/profile.php";';
			echo '</script>';	
		}
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
<title>Create Poll</title>
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
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Create New Poll</h4>
        </div>
		
		<div class="code_create">
			<form action="" method="POST">
				<input id="d_name" name="poll_name" type="text" placeholder="Poll Name" required >
				<input name="submit" type="submit" value="Create" id="create">
				<span><?php echo $error; ?></span>
			</form>
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
