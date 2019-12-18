<?php
include('creation.php');

$servername = "localhost";			//variable
$username = "root";					//variable
$password = "";						//variable
$dbname = "online_bus_ticket";		//variable
$conn = new mysqli($servername, $username, $password, $dbname);	//connect with database

//check if the sign in button is clicked
if (isset($_POST['button_sign_in'])) {					//if sign in button is clicked
	$email = mysqli_real_escape_string($conn,$_POST['mail_sign_in']);	//get mail
	$pass = mysqli_real_escape_string($conn,$_POST['pass_sign_in']);	//get pass
	$repass = mysqli_real_escape_string($conn,$_POST['re_pass_sign_in']);	//get pass again

	if(isset($_POST['remember_sign_in'])) {				//check if click remember me
		$rememberme = mysqli_real_escape_string($conn,$_POST['remember_sign_in']);
		if ($rememberme=="on") {	//if remember me is click
			setcookie("cookie_mail", $email, time()+(86400 * 30), "/", $servername);	//set cookie for mail

		}
		else{
			setcookie("cookie_mail", "", time()+(0 * 30), "/", $servername);	//set cookie for mail
		}
	}

	$insertData = "INSERT INTO customer (mail, pass, re_pass) VALUES ('$email', '$pass', '$repass')"; //insert into CUSTOMER table
	mysqli_query($conn,$insertData);  //execute query
	header("Location:../buy ticket.php");
}
$conn->close();
?>
