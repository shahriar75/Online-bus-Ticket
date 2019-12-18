<?php
$servername = "localhost";				//variable
$username = "root";						//variable
$password = "";							//variable
$dbname = "online_bus_ticket";			//variable

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS online_bus_ticket";
mysqli_query($conn,$sql);

$conn = new mysqli($servername, $username, $password, $dbname); //connect with database ONLINE_BUS_TICKET

$table = "SELECT * FROM customer";         //check if table is already created
$checkTable = mysqli_query($conn,$table);
if (!$checkTable) {														
	$createTable = "CREATE TABLE customer ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, mail VARCHAR(50) NOT NULL,
	pass VARCHAR(50) NOT NULL, re_pass VARCHAR(50) NOT NULL)";
	mysqli_query($conn,$createTable);				//create customer table
}

$table = "SELECT * FROM buses";         //check if table is already created
$checkTable = mysqli_query($conn,$table);
if (!$checkTable) {														
	$createTable = "CREATE TABLE buses ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, company_name VARCHAR(50),
	coach_no VARCHAR(50), starting_point VARCHAR(50), departure_point VARCHAR(50), starting_time VARCHAR(50), arrival_time VARCHAR(50), coach_type VARCHAR(50), fare VARCHAR(50), seats VARCHAR(50))";
	mysqli_query($conn,$createTable);				//create buses table
}

$table = "SELECT * FROM seat_plan";         //check if table is already created
$checkTable = mysqli_query($conn,$table);
if (!$checkTable) {														
	$createTable = "CREATE TABLE seat_plan ( seat_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, bus_id INT(6),
	availibility VARCHAR(1), blocked VARCHAR(1), seat_no VARCHAR(3))";
	mysqli_query($conn,$createTable);				//create seat_plan table
}

$selectTable = "SELECT * FROM buses";
$result = mysqli_query($conn, $selectTable);

if ($result->num_rows < 1) {
	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('National Travels', 'DHAKA HA-3456', 'Dhaka', 'Rajshahi', '7.00 am', '2.00 pm', 'Non-AC',
			'500.00', '23/40')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('National Travels', 'DHAKA HA-3456', 'Kallanpur, Dhaka', 'Binodpur, Rajshahi', '7.00 am', 
			'2.00 pm', 'Non-AC', '500.00', '23/40')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Desh Travels', 'NABABGONJ KA- 67890', 'Chapainawabgonj', 'Gabtoli, Dhaka', '10.00 am',
			'5.30 am', ' AC', '1100.00', '12/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Shamoli Paribahan', 'NABABGONJ GA- 1290', 'Chapainawabgonj', 'Technical, Dhaka', '10.00 am',
			'5.30 am', 'Non-AC', '1100.00', '12/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Hanif Enterprise', 'NABABGONJ GA- 1290', 'Chapainawabgonj', 'Technical, Dhaka', '10.00 am',
			'5.30 am', 'Non-AC', '1100.00', '12/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Hanif Enterprise', 'NABABGONJ GA- 1290', 'Rangpur', 'Technical, Dhaka', '10.00 am', '5.30 am',
			'Non-AC', '1100.00', '15/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Saintmartin Paribahan', 'CHITTAGONG GHA- 1290', 'Rangpur', 'Technical, Dhaka', '10.00 am',
			'5.30 am', 'Non-AC', '1100.00', '15/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Cox\"s Bazar Paribahan', 'CHITTAGONG GHA- 1290', 'Rangpur', 'Technical, Dhaka', '10.00 am',
			'5.30 am', 'Non-AC', '1100.00', '15/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Akota Paribahan', 'CHITTAGONG GHA- 1290', 'Rajshahi', 'Technical, Dhaka', '10.00 am',
			'5.30 am', 'Non-AC', '1100.00', '15/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('TR Travels', 'CHITTAGONG GHA- 1290', 'Rajshahi', 'Technical, Dhaka', '10.00 am', '5.30 am',
			'Non-AC', '1100.00', '15/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Hanif Enterprise', 'COMILLA RA- 1290', 'Noakhali', 'Saydabad Bus Terminal, Dhaka', '10.00 am',
			'5.30 am', 'Non-AC', '1100.00', '15/33')";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO buses (company_name, coach_no, starting_point, departure_point, starting_time, arrival_time, coach_type,
			fare, seats) VALUES ('Hanif Enterprise', 'COMILLA RA- 1290', 'Mohakhali, Dhaka', 'Jamalpur', '110.00 am', '3.30 am',
			' AC', '1100.00', '25/33')";
	mysqli_query($conn, $sql);

	$selectTable = "SELECT * FROM seat_plan";
	$result = mysqli_query($conn, $selectTable);

	if ($result->num_rows < 1) {
		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'R', 'Y', 'A-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'R', 'Y', 'A-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'A-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'A-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'R', 'Y', 'B-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'R', 'Y', 'B-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'S', 'Y', 'B-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'S', 'Y', 'B-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'C-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'C-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'S', 'Y', 'C-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'S', 'Y', 'C-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'D-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'D-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'D-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'D-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'E-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'E-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'E-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'E-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'F-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'F-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'F-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'F-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'G-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'G-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'G-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'G-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'H-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'H-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'H-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'H-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'I-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'I-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'I-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'I-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'J-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'J-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'J-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (1, 'A', 'N', 'J-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'A-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'A-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'A-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'A-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'B-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'B-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'B-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'B-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'C-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'C-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'C-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'C-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'D-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'D-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'D-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'D-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'E-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'E-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'E-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'E-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'F-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'F-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'F-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'F-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'G-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'G-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'G-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'G-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'H-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'H-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'H-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'H-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'I-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'I-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'I-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'I-4')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'J-1')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'J-2')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'J-3')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO seat_plan (bus_id, availibility, blocked, seat_no) VALUES (2, 'A', 'N', 'J-4')";
		mysqli_query($conn, $sql);
	}
}

$conn->close();
?>
