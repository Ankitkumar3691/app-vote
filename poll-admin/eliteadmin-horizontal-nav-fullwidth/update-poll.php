<?php
include 'config.php';

if(isset($_POST['Submit'])){
	
	$id= pg_escape_string($_POST['Id']);	
	$que= pg_escape_string($_POST['question_name']);
	$cunt= pg_escape_string($_POST['count_number']);
	$dsc= pg_escape_string($_POST['que_desc']);

	$sql = 'UPDATE vote SET "Question"= \''.$que.'\', "Count_num"= \''.$cunt.'\', "Quest_Desc"= \''.$dsc.'\' where vote."Id" = \''.$id.'\'';
	
	$result_update = pg_query($sql) or die('Query failed: ' . pg_last_error());

    if($result_update)
	{
		echo '<script type="text/javascript">'; 
        echo 'alert("Update successfully");'; 
        echo 'window.location.href = "https://poll-upvoting.herokuapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/profile.php";';
        echo '</script>';
	}
	else
	{
		$message = "Update unsuccessful ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
if(isset($_GET['id']))
{
	$id= pg_escape_string($_GET['id']);
	
	$query = 'SELECT * from vote where vote."Id" = \''.$id.'\'';
	
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());	
	
	// output data of each row
	while($row = pg_fetch_array($result)) {
		$id= $row["Id"];
		$a= $row["Question"];
		$b= $row["Count_num"];
		$d= $row["Quest_Desc"];
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
<title>Update Poll Question</title>
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
          <h4 class="page-title">Create New Questions for Poll</h4>
        </div>
		
		<div class="code_update">
			<form method="post"  name="update" action="" /> 
				<input type="hidden" name="Id" value="<?php echo($id); ?>">             
				<input type="text" name="question_name" placeholder="Question Name" value="<?php echo($a); ?>"/></br>  
				<input type="text" name="count_number" placeholder="Counts" value="<?php echo($b); ?>"/></br>
				<input type="text" name="que_desc" placeholder="Question Desc" value="<?php echo($d); ?>"/></br>  
				<input type="submit" name="Submit" value="Update"/> 
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
