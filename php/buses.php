<?php
$servername = "localhost";			//variable
$username = "root";					//variable
$password = "";						//variable
$dbname = "online_bus_ticket";		//variable
$conn = new mysqli($servername, $username, $password, $dbname);	//connect with database
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/buses.css">
	<link rel="stylesheet" type="text/css" href="css/filter.css">
	<link rel="stylesheet" type="text/css" href="css/seat plan.css">
	<script src="js/filter.js"></script>
	<!-- included for date picker  -->
	<link rel="stylesheet" type="text/css" href="theme/date picker/style.css">
	<script type="text/javascript" src="theme/date picker/function.js"></script>
	<!-- included for date picker  -->
</head>
<body>
	<script>
		function showSeatPlanModal(bus_id){
			document.getElementById('seat_plan_outer').style.display="block";
			document.cookie = "cookie_bus_id="+bus_id;
			//document.cookie = "cookie_bus_id=bus id; expires=Fri, 03 Aug 2019 12:00:00 UTC; path=/";
			//document.cookie = "cookie_bus_id=" + bus_id + ";" + expires + ";path=/";
			//alert(bus_id);
		}

				$(function() {
      $('div.scroll_table table tr').click(function(evt) {
      	//alert($(this).text());
         $("#seat_container").load("php/cookie.php")
         $("#bus_details").load("php/bus_details.php")
         evt.preventDefault();
      })
    })

	</script>
	<div class="filter_container">
		<div class="filter_section_one">
			<div class="filter_section_one_from"><label class="filter_label_small">From: </label>
				<select id="filter_input_starting" class="filter_section_one" onchange="filterBusesTable()">
					<option class="filter_option" value="">Select starting point</option>
					<?php
					$selectTable = "SELECT DISTINCT starting_point FROM buses";
					$result = mysqli_query($conn,$selectTable);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<option class='filter_option'>" .$row["starting_point"]. "</option>";
						}
					}
					?>
				</select></div>

			<div class="filter_section_one_from"><label class="filter_label_small">To: </label>
				<select id="filter_input_destination" class="filter_section_one" onchange="filterBusesTable()">
					<option class="filter_option" value="">Select destination point</option>
					<?php
					$selectTable = "SELECT DISTINCT departure_point FROM buses";
					$result = mysqli_query($conn,$selectTable);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<option class='filter_option'>" .$row["departure_point"]. "</option>";
						}
					}
					?>
				</select></div>
		</div>
		<div class="filter_section_two">
			<div class="filter_section_two_elem" style="width: 30%"><label class="filter_label_large">Coach Type: </label>
				<select id="filter_input_coach" class="filter_section_two" onchange="filterBusesTable()">
					<option class="filter_option" value="">Coach Type</option>
					<option class="filter_option" value=" AC">AC</option>
					<option class="filter_option" value="Non-AC">Non-AC</option>
					<?php
					$selectTable = "SELECT DISTINCT coach_type FROM buses";
					$result = mysqli_query($conn,$selectTable);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							//echo "<option class='filter_option'>" .$row["coach_type"]. "</option>";
						}
					}
					?>
				</select>
			</div>
			<div class="filter_section_two_elem" style="width: 50%"><label class="filter_label_large">Company Name: </label>
				<select id="filter_input_company" class="filter_section_two" style="width: 50%" onchange="filterBusesTable()">
					<option class="filter_option" value="">Company Name</option>
					<?php
					$selectTable = "SELECT DISTINCT company_name FROM buses";
					$result = mysqli_query($conn,$selectTable);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<option class='filter_option'>" .$row["company_name"]. "</option>";
						}
					}
					?>
				</select>
			</div>
			<div class="filter_section_two_elem" style="width: 20%"><label style="width: 30%;">Date: </label>
				<?php include('theme/date picker/date.php'); ?>
			</div>
		</div>
	</div>
	<div class="scroll_table">
	<table id="all_buses" class="buses">
	<tr>
		<th>Company Name</th>
		<th>Coach No</th>
		<th>Starting Point</th>
		<th>Departure Point</th>
		<th>Starting Time</th>
		<th>Arrival Time</th>
		<th> Coach Type </th>
		<th> Fare (Tk.)</th>
		<th>Available Seats</th>
	</tr>
	<?php
	include('creation.php');

	$servername = "localhost";			//variable
	$username = "root";					//variable
	$password = "";						//variable
	$dbname = "online_bus_ticket";		//variable
	$conn = new mysqli($servername, $username, $password, $dbname);	//connect with database

	$selectTable = "SELECT id, company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type, fare, seats FROM buses";
	$result = mysqli_query($conn,$selectTable);
	if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {$x=$row["id"];
		echo "<tr onclick='showSeatPlanModal($x)' id='b$x'><td>".$row["company_name"]. "</td><td>" .$row["coach_no"]. "</td><td>" .$row["starting_point"]. 
		"</td><td>" .$row["departure_point"]. "</td><td>" .$row["starting_time"]. "</td><td>" .$row["arrival_time"].
		"</td><td>" .$row["coach_type"]. "</td><td>" .$row["fare"]. "</td><td>" .$row["seats"]. "</td></tr>";
	}
	}
	$conn->close();
	?>
</table>
</div>
</body>
</html>