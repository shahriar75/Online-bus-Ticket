<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/seat plan.css">
	<link rel="stylesheet" type="text/css" href="css/log in.css">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<link rel='stylesheet' href="font/aclonica.css">
	<script src="js/journey_details.js"></script>
	<script src="js/tooltip.js"></script>
  	<script src="jquery/jquery.min.js"></script>
  	<script src="bootstrap/bootstrap.min.js"></script>

<style type="text/css">

</style>

</head>
<body>
	<div id="seat_plan_outer" class="seat_plan_outer">

		<span id="close_seat" onclick="document.getElementById('seat_plan_outer').style.display='none';" class="close_log_in" title="Close">&times;</span>
		<table class="seat_hint_outer">
			<tr>
			<td style="width: 15%;"><div class="seat_hint" style="background-color:green;"></div></td>
			<td style="width: 42%;">Available</td>
			<td style="width: 15%;"><div class="seat_hint" style="background-color:black;"></div></td>
			<td>Reserved</td>
			</tr>
			<tr>
			<td style="width: 15%;"><div class="seat_hint" style="background-color:orangered;"></div></td>
			<td style="width: 42%;">Sold</td>
			<td style="width: 15%;"><div class="seat_hint" style="background-color:indigo;"></div></td>
			<td>Selected</td>
			</tr>
		</table>

		<div class="seat_map">
			<div class="engine_container">
				<div class="entrance"></div>
				<div class="engine"></div>
				<div class="driver"></div>
			</div>

			<div class="seat_container" id="seat_container">
				<!--<?php include('php/cookie.php'); ?>-->
		</div>
	</div>
	<div class="seat_plan_rest_portion">
		<div style="display: flex; margin-left: 5px;">
			<div class="divider_section_one"></div>
			<div class="divider_section_two"></div>
		</div>
		<div style="width: 96%; margin: 0 0 0 15px; border: 1px solid white;">
			<div class="bus_details" id="bus_details">

			</div>
			<div class="cart">
				<div class="cart_title">Your Cart</div>
				<div class="choices" id="choices">
					
				</div>
				<div class="total_fare" id="total_fare">Total (500 <span>&times;</span> 0) = 0 Tk.</div>
			</div>
			<div id="buy_now" class="buy_now" onclick="funcBuyNow()">Buy Now</div>
		</div>	
	</div>
</div>
<?php include('journey_details.php'); ?>
</body>
</html>

<script type="text/javascript">
	/*$(function() {
      $("#"+bus_id).click(function(evt) {
         $("#seat_container").load("php/cookie.php")
         evt.preventDefault();
      })
    })*/

    		$(function() {
      $("#close_seat").click(function(evt) {
      	//alert($(this).text());
         $("#seat_container").empty();
         $("#bus_details").empty();
         $("#choices").empty();
         $("#total_fare").html("Total (500 <span>&times;</span> 0) = 0 Tk.");
         evt.preventDefault();
      })
    })

    		$(document).ready(function(){
  		$("#buy_now").click(function(){
  		var favourite = [];
  		$.each($("input[class='all_seats_for_buses']:checked"), function(){
  				var x = $(this).attr('id');
  				x = x.substring(1);
                favourite.push(x);
        });
     	document.cookie = "cookie_selected_seats=" + favourite;
  });
});

    </script>