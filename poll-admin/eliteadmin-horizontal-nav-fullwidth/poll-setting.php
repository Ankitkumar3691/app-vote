<?php
include('session.php');

include ('config.php');	

if(isset($_POST['submit'])){
	
	$poll_id = pg_escape_string($_GET['id']);
	$poll_title = pg_escape_string($_POST['poll-title']);
	$page_background = pg_escape_string($_POST['page_bg']);
	$poll_background = pg_escape_string($_POST['poll_bg_color']);
	$title_color = pg_escape_string($_POST['poll_title_color']);
	$item_color = pg_escape_string($_POST['poll_item_color']);
	$desc_color = pg_escape_string($_POST['poll_desc_color']);
	$count_back_color = pg_escape_string($_POST['count_bg_color']);
	$count_text_color = pg_escape_string($_POST['count_text_color']);
	
	// Poll Logo Upload and Show
	$uploaddir = 'poll-logo/';
	$uploadfile = $uploaddir . basename($_FILES['myimage']['name']);	
	
	if (move_uploaded_file($_FILES['myimage']['tmp_name'], $uploadfile))
	{    
		//echo "File is valid, and was successfully uploaded.\n"; 
	}
	else   {   echo "File size greater than 300kb!\n\n";   }	

	// Checking exiting Record 	
	$select = 'SELECT * from poll_setting where poll_setting."Poll_id" = \''.$poll_id.'\'';
	$select_result = pg_query($select) or die('Query failed: ' . pg_last_error());
	
	$rows = pg_num_rows($select_result);
	
	if ($rows == 1) {
		// Update Exiting Poll Logo
		$update = 'UPDATE poll_setting SET "Poll_id"= \''.$poll_id.'\', "Logo_Path"= \''.$uploadfile.'\', "Poll_Title"= \''.$poll_title.'\', "Page_Bg_Color"= \''.$page_background.'\', "Poll_Bg_Color"= \''.$poll_background.'\', "Poll_Title_Color"= \''.$title_color.'\', "Poll_Item_Color"= \''.$item_color.'\', "Description_Color"= \''.$desc_color.'\', "Count_BG_Color"= \''.$count_back_color.'\', "Count_Text_Color"= \''.$count_text_color.'\' where poll_setting."Poll_id" = \''.$poll_id.'\'';	
		
		$update_result = pg_query($update) or die('Query failed: ' . pg_last_error());
	
	} 
	else {
		// Insert New Poll Logo
		$insert = 'INSERT INTO poll_setting ("Poll_id","Logo_Path","Poll_Title","Page_Bg_Color","Poll_Bg_Color","Poll_Title_Color","Poll_Item_Color","Description_Color","Count_BG_Color","Count_Text_Color") VALUES (\''.$poll_id.'\',\''.$uploadfile.'\',\''.$poll_title.'\',\''.$page_background.'\',\''.$poll_background.'\',\''.$title_color.'\',\''.$item_color.'\',\''.$desc_color.'\',\''.$count_back_color.'\',\''.$count_text_color.'\')';
		$insert_result = pg_query($insert) or die('Query failed: ' . pg_last_error());
	}
} 
if(isset($_GET['id']))
{
	$p_id= pg_escape_string($_GET['id']);
	
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
<!-- Color picker plugins css -->
<link href="../plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
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
          <h4 class="page-title">Settings for Poll</h4>
        </div>
		<div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
			<!-- Logo Upload -->
			<div id="poll-settings">
			<form method="POST" action="" enctype="multipart/form-data">
				<h3>Upload Logo : </h3><p><input type="file" name="myimage"/></p>
					<div id="show-image">
						<img src="http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/<?php echo ($a); ?>" width="100" height="100">
					</div>			
				<h3>Poll Title : </h3><p><input id="" name="poll-title" type="text" placeholder="Poll Title" value="<?php echo($b); ?>"></p>
				<h3>Page Background Color : </h3><p><input type="text" name="page_bg" class="colorpicker" value="<?php echo($c); ?>" /></p>	
				<h3>Poll Background Color : </h3><p><input type="text" name="poll_bg_color" class="colorpicker" value="<?php echo($d); ?>" /></p>
				<h3>Poll Title Color : </h3><p><input type="text" name="poll_title_color" class="colorpicker" value="<?php echo($e); ?>" /></p>
				<h3>Poll Item Color : </h3><p><input type="text" name="poll_item_color" class="colorpicker" value="<?php echo($f); ?>" /></p>
				<h3>Poll Description Color : </h3><p><input type="text" name="poll_desc_color" class="colorpicker" value="<?php echo($g); ?>" /></p>	
				<h3>Count BG Color : </h3><p><input type="text" name="count_bg_color" class="colorpicker" value="<?php echo($h); ?>" /></p>
				<h3>Count Text Color : </h3><p><input type="text" name="count_text_color" class="colorpicker" value="<?php echo($i); ?>" /></p>
				<input id="setting_submit" type="submit" name="submit" value="Save">
			</form>
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
<!-- Color Picker Plugin JavaScript -->
<script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="../plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<script>
$(".colorpicker").asColorPicker();
$(".complex-colorpicker").asColorPicker({
    mode: 'complex'
});
$(".gradient-colorpicker").asColorPicker({
    mode: 'gradient'
});
</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
