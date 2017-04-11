<?php
include('session.php');

include ('config.php');	

if(isset($_GET['user']))
{
	$my_user= pg_escape_string($_GET['user']);
	
	$query = 'Select * from admin_user where admin_user."Username" = \''.$username.'\'';
	
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());	
	
	// output data of each row
	while($row = pg_fetch_array($result)) {
		$id= $row["id"];
	}
}
?>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="profile.php"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        <li>
          <!--form role="search" class="app-search hidden-xs">
            <input type="text" placeholder="Search..." class="form-control">
            <a href=""><i class="fa fa-search"></i></a>
          </form-->
        </li>
		<li><input type="hidden" class="hidden_id" name="name" value="<?php echo $_POST['id']; ?>"></li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">  
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="default_avatar.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><? echo $my_user ?></b> </a>
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
