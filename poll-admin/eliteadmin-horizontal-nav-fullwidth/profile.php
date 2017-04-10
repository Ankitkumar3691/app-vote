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
<title>Poll Voting Interface</title>
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
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="profile.php"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        <li>
          <form role="search" class="app-search hidden-xs">
            <input type="text" placeholder="Search..." class="form-control">
            <a href=""><i class="fa fa-search"></i></a>
          </form>
        </li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">  
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="default_avatar.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">admin</b> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
        <!-- /.dropdown -->
      </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
  <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
		<ul class="nav" id="side-menu">
        <li class="sidebar-search hidden-sm hidden-md hidden-lg">
          <!-- input-group -->
          <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
          <!-- /input-group -->
        </li>
        <li> <a href="#" class="waves-effect "><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Poll <span class="fa arrow"></span> </span></a></li>
        <li> <a href="#" class="waves-effect "><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Settings <span class="fa arrow"></span> </span></a></li>
		</ul>
    </div>
  </div>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title"></h4>
        </div>
		
		
			
        <!-- /.col-lg-12 -->
      <div class="right-sidebar">
        <div class="slimscrollright">
          <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
          <div class="r-panel-body">
            <ul>
              <li><b>Layout Options</b></li>
              
              <li>
                <div class="checkbox checkbox-info">
                  <input id="checkbox1" type="checkbox" class="fxhdr">
                  <label for="checkbox1"> Fix Header </label>
                </div>
              </li>
            </ul>
            <ul id="themecolors" class="m-t-20">
              <li><b>With Light sidebar</b></li>
              <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
              <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
              <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
              <li><a href="javascript:void(0)" theme="blue" class="blue-theme working">4</a></li>
              <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
              <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
              <li><b>With Dark sidebar</b></li>
              <br>
              <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
              <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
              <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>

              <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
              <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
              <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
            </ul>
          </div>
        </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 233.38px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
      </div>
	  
  <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
            <h3 class="box-title">Create or Edit Poll Items</h3>
            <table class="table table-striped table-bordered" id="editable-datatable">
				<thead>
				<tr>
				  <th>Id</th>
				  <th>Poll Item</th>
				  <th>Counts</th>
				  <th>Poll Item Description</th>
				  <th>Action</th>
				</tr>
				</thead>			
				<tbody>
<?php
$sql = 'SELECT * from vote ORDER BY vote."Id"';
$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

	while ($row = pg_fetch_array($result)) {	
		$id= $row["Id"];
        echo "<tr id='$id'><td>" . $row["Id"]. "</td><td>" . $row["Question"]. "</td><td>" . $row["Count_num"]. "</td><td>" . $row["Quest_Desc"] . "</td><td>" ."<a href='https://poll-upvoting.herokuapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/update-poll.php?id=$id'><img src='edit_one.png' alt='Edit'/></a>"  ."&nbsp;/&nbsp;<a href='https://poll-upvoting.herokuapp.com/poll-admin/eliteadmin-horizontal-nav-fullwidth/delete-poll.php?id=$id'><img src='close.png' alt='Delete'/></a>"  ."</td></tr>";
    }
?>
				</tbody>
				<tfoot>
					<tr>
					  <th>Id</th>
					  <th>Poll Item</th>
					  <th>Counts</th>
					  <th>Poll Item Description</th>
					  <th>Action</th>
					</tr>
				</tfoot>	
			</table>
          </div>
        </div>
      </div>
			
	<div id="code">
		<h3 align="center"><u><a href="create-poll.php"<button class="button">Create a new poll Item</button></a></u></h3>
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
$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
  $(document).ready(function(){
      $('#editable-datatable').DataTable();
      
});
    
</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
