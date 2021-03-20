<?php

?>
<head>
<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<style>
    #products, #products th, #products td{
    border: 1px solid black;
    text-align: center;
    }
    
</style>
<meta charset="UTF-8">
<title>Display Users</title>
</head>
<body>
<form action="../Handlers/adminHandler.php" method="POST">
<table id="products" class="display">
<thead>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Banned</th>
		<th>Deleted</th>
		<th>Username</th>
		<th>Role Number</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Ban</th>
	</tr>
</thead>

<tbody>
<?php 
for($x=0; $x < count($users); $x++)
{
    echo "<tr>";
    echo "<td>" . $users[$x][0] . "</td>" . "<td>" .
        $users[$x][1] . "</td>" . "</td>" . "<td>" . $users[$x][2] . "</td>" 
      . "<td>" . $users[$x][3] . "</td>" . "<td>" . $users[$x][4] . "</td>"
    . "<td>" . $users[$x][5] . "</td>" . "<td>" . $users[$x][6] . "</td>"
    . "<td>" . $users[$x][7] . "</td>"
    . "<td>" . "<button name='edit' type='submit' value=". $users[$x][0] .">Edit</button></td>" 
        . "<td>" . "<button name='delete' type='submit' value=". $users[$x][0].">Delete</button></td>";
    if($users[$x][4] == 'Y')
    {
        echo "<td>" . "<button name='unban' type='submit' value=" . $users[$x][0].">Unban</button></td>";
    }
    else 
    {
        echo "<td>" . "<button name='ban' type='submit' value=". $users[$x][0].">Ban</button></td>";
    }
        echo "</tr>";
}
?>
</tbody>
</table>
</form>
<script>
	$(document).ready( function () {
		$('#products').DataTable();
	});	
</script>
</body>