<?php
include('session.php');

include ('config.php');	
?>

<html>
	<head>
		<title>Poll Questions</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
		<script>
		$(document).ready(function() {
			$('#example').DataTable( {
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo( $(column.footer()).empty() )
							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
		 
								column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
							} );
		 
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			} );
		} );
		</script>
		<style>
			td {
				text-align:center;
			}
		</style>
	</head>
<body>
	<div id="profile">
		<b id="welcome"><a href="profile.php">Back to Home</a></b>
		<b id="logout"><a href="logout.php">Log Out</a></b>
	</div>
	<div id="code">
		<h3 align="center"><u><a href="#"<button class="button">Create New Question</button></a></u></h3>
	</div>
		<h4 align="center"> Questions details </h4>
		<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Counts</th>
				<th>Question</th>
				<th>Question Desc</th>
				<th>ID</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Counts</th>
				<th>Question</th>
				<th>Question Desc</th>
				<th>ID</th>
				<th>Action</th>
			</tr>
		</tfoot>
		<tbody>
<?php
$sql = 'SELECT * from vote ORDER BY vote."Id"';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

if ($result-> pg_num_rows > 0) {
    // output data of each row
    while($row = pg_fetch_array($result)) {
		$id= $row["Id"];
        echo "<tr><td>" . $row["Id"]. "</td><td>" . $row["Question"]. "</td><td>" . $row["Count_num"]. "</td><td>" . $row["Question_Desc"] . "</td><td>" ."<a href='#'>Edit</a>"  ."&nbsp;/&nbsp;<a href='#'>Delete</a>"  ."</td></tr>";
    }
} 
else {
    echo "0 results";
}
?>
		</tbody>
		</table>	
</body>
</html>
