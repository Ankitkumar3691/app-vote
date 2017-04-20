<?php
include('session.php');

include ('config.php');	

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
	<title>Item Status</title>
	<!-- Bootstrap Core CSS -->
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".Status_Request .bootstrap-switch-container span").click(function(){
        $("enter_status ul").toggle();
    });
});
</script>
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
				  <h4 class="page-title">Poll Item Status</h4>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="col-md-6 col-sm-12 col-xs-12 bt-switch">
								<div class="m-b-30">
								<center class="Status_Request"><h3>Item Status : </h3>
									<input type="checkbox" name="item_sts" checked data-size="normal" value="Show" data-on-text="Show" data-off-text="Hidden"/>
									</center>
								</div>
								<div id="enter_status">
									<ul><h4>Please Enter Status for Item :</h4>
										<input type="text" name="new_status" placeholder="Enter Status" value="<?php echo($); ?>"/></ul>
								</div>	
							</div>								
							<div class="col-md-12 col-sm-12 col-xs-12">							
								<center><input id="setting_submit" type="submit" name="submit" value="Save"></center>
							</div>
						</form>
				</div>
				<!-- /.col-lg-12 -->
				<?php include('right-sidebar.php');?>
			</div>
		</div>
		<footer class="footer text-center"> 2017 &copy; Poll Voting Admin Interface </footer>
	</div>
  <!-- /#page-wrapper -->
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
<!-- bt-switch -->
<script src="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript">
   $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
   var radioswitch = function() {
      var bt = function() {
         $(".radio-switch").on("switch-change", function() {
            $(".radio-switch").bootstrapSwitch("toggleRadioState")
         }), 
         $(".radio-switch").on("switch-change", function() {
            $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
         }), 
         $(".radio-switch").on("switch-change", function() {
            $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
         })
      };
      return {
         init: function() {
            bt()
         }
      }
   }();
   $(document).ready(function() {
      radioswitch.init()
   });
</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
