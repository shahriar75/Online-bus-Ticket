<?php
$servername = "localhost";			//variable
$username = "root";					//variable
$password = "";						//variable
$dbname = "online_bus_ticket";		//variable
$conn = new mysqli($servername, $username, $password, $dbname);	//connect with database
$bus_id = $_COOKIE['cookie_bus_id'];

$selectFromBuses = "SELECT * FROM buses WHERE id = $bus_id";
//$selectFromSeatPlan = "SELECT * FROM buses WHERE bus_id = $bus_id";
$result = mysqli_query($conn,$selectFromBuses);
$row = mysqli_fetch_assoc($result);

session_start();
if (isset($_SESSION['pass_name'])) {

    // it does; output the message
    echo $_SESSION['pass_name'];

    // remove the key so we don't keep outputting the message
    //unset($_SESSION['pass_name']);
}
?>


<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title></title>
	<style type="text/css">
		.ticket_container {
			position: absolute;
			left: 30%;
			width: 500px;
			min-height: 400px;
			border: 1px solid black;
			background-color: #F3F3F3;
		}
		.ticket_header {
			position: relative;
			width: 100%;
			color: blue;
			font-size: 20px;
			text-align: center;
		}
		.pass_copy {
			position: relative;
			width: 50%;
			color: white;
			font-size: 20px;
			border: 1px solid black;
			border-radius: 50px;
			text-align: center;
			margin: 0 0 5% 25%;
			background-color: forestgreen;
		}
		.element_row {
			position: relative;
			display: flex;
			width: 100%
			padding: 5px;
			margin: 0 0 5px 5px;
		}
		.element_row_elem {
			width: 23%;
			font-weight: bold;
			font-size: 12px;
			padding-left: 10px;
		}
		.element_row_val {
			width: 60%;
			border: 1px dotted black;
			border-top: 0;
			border-left: 0;
			border-right: 0;
			font-size: 13px;
			padding-left: 2px;
		}
	</style>
</head>
<body>
	<div id="ticket_container" class="ticket_container">
		<div class="ticket_header"><?php echo $row["company_name"] ?></div>
		<div class="pass_copy">Passenger Copy</div>
		<div class="element_row">
			<div class="element_row_elem">Full Name :</div>
			<div class="element_row_val"><code><?php echo $_SESSION['pass_name'] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Address :</div>
			<div class="element_row_val"><code><?php echo $_SESSION['pass_address'] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Gender :</div>
			<div class="element_row_val"><code><?php echo $_SESSION['pass_gender'] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Coach No. :</div>
			<div class="element_row_val"><code><?php echo $row["coach_no"] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Leaving From :</div>
			<div class="element_row_val"><code><?php echo $_SESSION['pass_leaving'] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Departing On :</div>
			<div class="element_row_val"><code><?php echo $_SESSION['pass_departing'] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Reporting Time :</div>
			<div class="element_row_val" style="width: 15%;"><code><?php echo $row["starting_time"] ?></code></div>
			<div class="element_row_elem" style="margin-left: 10px;">Departure Time :</div>
			<div class="element_row_val" style="width: 15%;"><code><?php echo $row["arrival_time"] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Issue Date :</div>
			<div class="element_row_val"><code><?php echo $_SESSION['pass_issue_date'] ?></code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Journey Date :</div>
			<div class="element_row_val"><code>01 July, 2018</code></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Seats :</div>
			<div class="element_row_val" style="border: 0px;"><b>A1, B1</b></div>
		</div>
		<div class="element_row">
			<div class="element_row_elem">Fare :</div>
			<div class="element_row_val" style="width: 20%; border: 0px;"><?php echo $row["fare"] ?> Tk.</b></div>
			<div class="element_row_elem" style="width: 15%;">Total Fare :</div>
			<div class="element_row_val" style="width: 30%; border: 0px;">(500*2) = 1000 Tk.</b></div>
		</div>
	</div>

	<script type="text/javascript">

window.onbeforeunload=function Close(){
//return 'Are you really want to perform the action?';
}
	</script>

</body>
</html>