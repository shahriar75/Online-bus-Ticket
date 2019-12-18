<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/seat plan.css">
	<link rel="stylesheet" type="text/css" href="css/log in.css">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="js/tooltip.js"></script>
  	<script src="jquery/jquery.min.js"></script>
  	<script src="bootstrap/bootstrap.min.js"></script>

<style type="text/css">

</style>

</head>
<body>
	<div id="seat_plan_outer" class="seat_plan_outer">
		<span onclick="document.getElementById('seat_plan_outer').style.display='none';" class="close_log_in" title="Close">&times;</span>

		<table class="seat_hint_outer">
			<tr>
			<td><div class="seat_hint" style="background-color:green;"></div></td>
			<td>Available</td>
			<td><div class="seat_hint" style="background-color:black;"></div></td>
			<td>Reserved</td>
			</tr>
			<tr>
			<td><div class="seat_hint" style="background-color:orangered;"></div></td>
			<td>Sold</td>
			<td><div class="seat_hint" style="background-color:indigo;"></div></td>
			<td>Selected</td>
			</tr>
		</table>

		<div class="seat_map">
			<div class="engine_container">
				<div class="entrance"></div>
				<div class="driver"></div>
			</div>

			<div class="seat_container">

       <?php
       $servername = "localhost";			//variable
	   $username = "root";					//variable
	   $password = "";						//variable
	   $dbname = "online_bus_ticket";		//variable
	   $conn = new mysqli($servername, $username, $password, $dbname);	//connect with database

	   $selectTable = "SELECT seat_id, bus_id, availibility, blocked, seat_no FROM seat_plan WHERE bus_id = 1";
	   $result = mysqli_query($conn,$selectTable);
	   $x = 1;
	   echo "<ol class='seats'>";
	   if ($result->num_rows > 0) {
	   	while ($row = $result->fetch_assoc()) {
	   		echo "<li class='seat'>";
	   		if($row["availibility"]=='S') {
	   			echo "<input type='checkbox' id='" .$row["seat_id"]. "' disabled><label for='" .$row["seat_id"]. 
	   			"' style='background-color: orangered;' data-toggle='tooltip_ticket' title='Already sold'>".$row["seat_no"]. 
	   			"</label></li>";
	   		}
	   		else if($row["availibility"]=='R') {
	   			echo "<input type='checkbox' id='" .$row["seat_id"]. "' disabled><label for='" .$row["seat_id"]. 
	   			"' style='background-color:black;'data-toggle='tooltip_ticket' title='Reserved!'>".$row["seat_no"]. "</label></li>";
	   		}
	   		else {
	   			echo "<input type='checkbox' id='" .$row["seat_id"]. "'><label for='" .$row["seat_id"]. "'>"
	   			.$row["seat_no"]. "</label></li>";
	   		}
	   		if ($x%4 == 0) {
	   			echo "</ol><ol class='seats'>";
	   		}
	   		$x++;
	   	}
	    }echo "<p style='color:black;'>val: " . $_COOKIE['cookie_bus_id']. "</p>";
	    echo "</ol>";
       		
       		while ( $x < 0) {
       			echo "<ol class='seats' type='A'>
       			<li class='seat'> <input type='checkbox' id='A1'><label for='A1'>A</label></li>
       			<li class='seat'> <input type='checkbox' id='A1'><label for='A1'>A</label></li>
       			<li class='seat'> <input type='checkbox' id='A1'><label for='A1'>A</label></li>
       			<li class='seat'> <input type='checkbox' id='A1'><label for='A1'>A</label></li>
       			</ol>";
       			$x++;
       		}
       	$conn->close();	
       	?>	
       </div>
		</div>
</body>
</html>