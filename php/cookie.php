<?php
       $servername = "localhost";			//variable
	   $username = "root";					//variable
	   $password = "";						//variable
	   $dbname = "online_bus_ticket";		//variable
	   $conn = new mysqli($servername, $username, $password, $dbname);	//connect with database
	   $y = $_COOKIE['cookie_bus_id'];
	   $selectTable = "SELECT seat_id, bus_id, availibility, blocked, seat_no FROM seat_plan WHERE bus_id = $y";
	   $countSelectedRow = "SELECT COUNT(seat_id) FROM seat_plan WHERE bus_id = $y AND blocked = 'Y'";
	   $result = mysqli_query($conn,$selectTable);
	   $x = 1;
	   echo "<ol class='seats'>";
	   if ($result->num_rows > 0) {
	   	while ($row = $result->fetch_assoc()) {
	   		echo "<li class='seat'>";
	   		if($row["availibility"]=='S') {
	   			echo "<input type='checkbox' class='all_seats_for_buses' id='s" .$row["seat_id"]. "' disabled>";
	   			echo "<label for='s" .$row["seat_id"]. "' style='background-color: orangered;' title='Already sold'>";
	   			echo $row["seat_no"]. "</label></li>";
	   		}
	   		else if($row["availibility"]=='R') {
	   			echo "<input type='checkbox' class='all_seats_for_buses' id='s" .$row["seat_id"]. "' disabled>";
	   			echo "<label for='s" .$row["seat_id"]. "' style='background-color:black;' title='Reserved!'>";
	   			echo $row["seat_no"]. "</label></li>";
	   		}
	   		else {
	   			echo "<input type='checkbox' class='all_seats_for_buses' id='s" .$row["seat_id"]. "'>";
	   			echo "<label for='s" .$row["seat_id"]. "'>";
	   			echo $row["seat_no"]. "</label></li>";
	   		}
	   		if ($x%4 == 0) {
	   			echo "</ol><ol class='seats'>";
	   		}
	   		$x++;
	   	}
	    }
	    echo "</ol>";
	    //echo "<p style='color:black;' id='me_cookie'>val: " . $_COOKIE['cookie_bus_id']. "</p>";
       	$conn->close();	
       	?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function removeToken(seat_id) {
			var divId = document.getElementById("divs" +seat_id);
			divId.parentNode.removeChild(divId);
			document.getElementById("s" +seat_id).checked = false;
			totalFare();
		}

		function totalFare() {
			var no_of_selected_seat = $('#seat_container :input[type="checkbox"]:checked').length;
			var total_fare = 500 * no_of_selected_seat;
			$("#total_fare").html("Total (500<span> &times; </span>" +no_of_selected_seat+ ") = " +total_fare+ " Tk.");
		}

		$(function() {
			$('input:checkbox.all_seats_for_buses').click(function() {
				var seat_id = $(this).attr('id');
				var label_for = $("label[for='"+seat_id+"']").text();
				var seat_id_int = seat_id.substring(1);
				if ($(this).is(":checked")) {
					$("#choices").append("<div class='token' id='div" +seat_id+ "'>"
										+ "<div class='delete_token' onclick='removeToken(" +seat_id_int+ ")'>&times;</div>"
										+ "<p class='seat_no'>" +label_for+ "</p>"
										+ "<p class='fare'>500 Tk.</p></div>");
					totalFare();
				}
				else {
					totalFare();
					$('#div'+seat_id).remove();
				}
			});
		});
	</script>
</head>
<body>
<!--	<p id="show_no" style="color: red; background-color: green;">seat_id</p>-->
</body>
</html>       	