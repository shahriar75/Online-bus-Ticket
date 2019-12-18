<?php
include('creation.php');

$servername = "localhost";			//variable
$username = "root";					//variable
$password = "";						//variable
$dbname = "online_bus_ticket";		//variable
$conn = new mysqli($servername, $username, $password, $dbname);	//connect with database

//check if the log in button is clicked
if (isset($_POST['button_log_in'])) {				//if log in button is clicked
	$rememberme = mysqli_real_escape_string($conn,$_POST['remember_log_in']);
	$email = mysqli_real_escape_string($conn,$_POST['mail_log_in']);	//get mail
	$pass = mysqli_real_escape_string($conn,$_POST['pass_log_in']);	//get pass

	$selectTable = "SELECT * FROM customer WHERE mail = '$email' AND pass = '$pass'";
	$result = mysqli_query($conn, $selectTable);

	if ($result->num_rows > 0) {
		if (isset($_POST['remember_log_in'])) {						//check if click remember me
			$rememberme = mysqli_real_escape_string($conn,$_POST['remember_log_in']);
			if ($rememberme=="on") {	//if remember me is click
				setcookie("cookie_mail", $email, time()+(86400 * 30), "/", $servername);	//set cookie for mail
				header("Location:../buy ticket.php");
			}
			else{
				setcookie("cookie_mail", "", time()+(0 * 30), "/", $servername);	//set cookie for mail
			}
		}
	}
	else {
		echo "Log in failed. Your mail or password is incorrect.";
	}
}
?>