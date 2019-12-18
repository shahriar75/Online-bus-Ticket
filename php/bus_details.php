
<?php
	   $servername = "localhost";			//variable
	   $username = "root";					//variable
	   $password = "";						//variable
	   $dbname = "online_bus_ticket";		//variable
	   $conn = new mysqli($servername, $username, $password, $dbname);	//connect with database

	   $y = $_COOKIE['cookie_bus_id'];
	   $selectTable = "SELECT * FROM buses WHERE id = $y";
	   $result = mysqli_query($conn,$selectTable);

	   $row = $result->fetch_assoc();
	   echo "<div class='bus_details_section_one'>" .$row["company_name"]. "</div>";
	   echo "<div class='bus_details_section_middle'>";
	   echo "<div class='from'><b>From: </b>" .$row["starting_point"]. "</div>";
	   echo "<div class='from' style='text-align: right;''><b>To: </b>" .$row["departure_point"]. "</div> </div>";
	   echo "<div class='bus_details_section_last'>";
	   echo "<div class='last_element'><b>Time: </b>" .$row["starting_time"]. "</div>";
	   echo "<div class='last_element'><b>Date: </b>30 July, 2019</div>";
	   echo "<div class='last_element'><b>Type: </b>" .$row["coach_type"]. "</div>";

	   $conn->close();	
       ?>