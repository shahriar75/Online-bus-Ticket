<?php
$servername = "localhost";			//variable
$username = "root";					//variable
$password = "";						//variable
$dbname = "online_bus_ticket";		//variable
$conn = new mysqli($servername, $username, $password, $dbname);	//connect with database
if (isset($_POST['button_confirm_order'])) {

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$leaving = $_POST['leaving'];
	$departing = $_POST['departing'];
	$gender = $_POST['gender'];

	$get_selected_seats = $_COOKIE['cookie_selected_seats'];
	$seats = explode (",", $get_selected_seats);
	$y = $_COOKIE['cookie_bus_id'];
	$z = 0;
	for ($i=0; $i < count(array_filter($seats)); $i++, $z++) { 
		$query = "SELECT blocked FROM seat_plan WHERE bus_id = $y AND seat_id = $seats[$i]";
	    $result = mysqli_query($conn,$query);
	    $row = mysqli_fetch_assoc($result);
	    if ($row['blocked']=='Y') {
	    	break;
	    }
	}
	if ($z == count($seats)) {
		for ($i=0; $i < count($seats); $i++) { 
			$query = "UPDATE seat_plan SET blocked='Y', availibility='S' WHERE bus_id = $y AND seat_id = $seats[$i]";
			$result = mysqli_query($conn,$query);
		}

		$mydate=getdate(date("U"));
		session_start();
    	$_SESSION['pass_name'] = $name;
    	$_SESSION['pass_address'] = $address;
    	$_SESSION['phone'] = $phone;
    	$_SESSION['pass_leaving'] = $leaving;
    	$_SESSION['pass_departing'] = $departing;
    	$_SESSION['pass_gender'] = $gender;
    	$_SESSION['pass_issue_date'] = $mydate[mday] ." " . $mydate[month] .", " . $mydate[year] .$mydate[hours].$mydate[minutes];
		header("Location:php/ticket.php");
		exit();
	}
}

$conn->close();
?>