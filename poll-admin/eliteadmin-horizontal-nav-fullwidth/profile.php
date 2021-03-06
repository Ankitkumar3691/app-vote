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
<title>Polls Name</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Editable CSS -->
<link rel="stylesheet" href="../plugins/bower_components/jquery-datatables-editable/datatables.css" />
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
  <!-- Navigation -->
<?php
include('nav.php');
include('left-sidebar.php');
?>
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title"></h4>
        </div>
	
	<?php include('right-sidebar.php');?>
    
      </div>
	  
  <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
            <h3 class="box-title"> All Poll </h3>
            <table class="table table-striped table-bordered" id="editable-datatable">
				<thead>
				<tr>
				  <th>Id</th>
				  <th>Poll Name</th>
				  <th>View Items</th>
				  <th>Poll Setting</th>
				</tr>
				</thead>			
				<tbody>
<?php
$sql = 'SELECT * from vote_polls where vote_polls."user_name" = \''.$login_session.'\'';
$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

	while ($row = pg_fetch_array($result)) {	
		$id= $row["poll_id"];
        echo "<tr id='$id'><td>" . $row["poll_id"]. "</td><td>" . $row["poll_name"]. "</td><td>" ."<a href='http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/view-poll-items.php?id=$id'>View Poll Items</a>"."</td><td>" ."<a href='http://app.upvoteapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/poll-setting.php?id=$id'>Poll Settings</a>"."</td></tr>";
    }
?>
				</tbody>
				<tfoot>
					<tr>
				  <th>Id</th>
				  <th>Poll Name</th>
				  <th>View Items</th>
				  <th>Poll Setting</th>
					</tr>
				</tfoot>	
			</table>
          </div>
        </div>
      </div>
			
	<div id="code">
		<h3 align="center"><u><a href="new-poll.php"<button class="button">Create a new Poll</button></a></u></h3>
	</div>		
			
      </div>
   
    <footer class="footer text-center"> 2017 &copy; UpVoteApp.com </footer>
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
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!-- Editable -->
<script src="../plugins/bower_components/jquery-datatables-editable/jquery.dataTables.js"></script>
<script src="../plugins/bower_components/datatables/dataTables.bootstrap.js"></script>
<script src="../plugins/bower_components/tiny-editable/mindmup-editabletable.js"></script>
<script src="../plugins/bower_components/tiny-editable/numeric-input-example.js"></script>
<script>
/* $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
  $(document).ready(function(){
      $('#editable-datatable').DataTable();
      
}); */
</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
