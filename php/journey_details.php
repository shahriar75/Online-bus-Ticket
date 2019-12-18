<?php

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/journey_details.css">
	<link rel="stylesheet" type="text/css" href="css/log in.css">
	<script type="text/javascript" src="js/journey_details.js"></script>
</head>
<body>
	<div id="modal_curtain_for_buy" style="display: none;" class="modal_curtain_buy_now" >
		<form action="confirmation.php" target="_blank" method="POST"> 
			<div id="buyer_details" class="buyer_details">
				<span onclick="funcCloseBuyNow()" class="close_log_in" title="Close">&times;</span>
				<div class="buyer_details_body">

					<label class="label_buyer_details" for=""><b>Full Name:</b></label><br>
					<div class="input_buyer_details">
						<div id="icon_f_name" class="icon" style="background-image: url(icon/person.png);"></div>
						<input id="input_buy_name" class="input_buy" type="text" name="name" placeholder="Enter Your Name" required onfocus="focusIn('icon_f_name')" onfocusout="focusOut('icon_f_name')"></div>

					<label class="label_buyer_details" for=""><b>Address:</b></label><br>
					<div class="input_buyer_details">
						<div id="icon_l_name" class="icon" style="background-image: url('icon/person.png');"></div>
						<input id="input_buy_address" class="input_buy" type="text" name="address" placeholder="Enter Your Address" required onfocus="focusIn('icon_l_name')" onfocusout="focusOut('icon_l_name')"></div>

					<label class="label_buyer_details" for=""><b>Phone no.:</b></label><br>
					<div class="input_buyer_details">
						<div id="icon_phone" class="icon" style="background-image: url('icon/phone.png');"></div>
						<input id="input_buy_phone" class="input_buy" type="text" name="phone" placeholder="Enter Your Phone no." required onfocus="focusIn('icon_phone')" onfocusout="focusOut('icon_phone')"></div>

					<label class="label_buyer_details" for=""><b>Leaving From:</b></label><br>
					<div class="input_buyer_details">
						<div id="icon_l_from" class="icon" style="background-image: url('icon/location.png');"></div>
						<input id="input_buy_leaving" class="input_buy" type="text" name="leaving" placeholder="Where You Leaving From?" required onfocus="focusIn('icon_l_from')" onfocusout="focusOut('icon_l_from')"></div>

					<label class="label_buyer_details" for=""><b>Departing On:</b></label><br>
					<div class="input_buyer_details">
						<div id="icon_d_on" class="icon" style="background-image: url('icon/location.png');"></div>
						<input id="input_buy_departing" class="input_buy" type="text" name="departing" placeholder="Where You Departing On?" required onfocus="focusIn('icon_d_on')" onfocusout="focusOut('icon_d_on')"></div>

					<label class="label_buyer_details" for=""><b>Gender:</b></label><br>
					<div class="input_buyer_details">
						<div id="icon_gender" class="icon_select" style="background-image: url('icon/gender.png');"></div>
						<select id="input_buy_gender" class="select_buy" name="gender" required onfocus="focusIn('icon_gender')" onfocusout="focusOut('icon_gender')">
							<option value="Select Your Gender">Select Your Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Others">Others</option>
						</select></div>

					<div class="button_container">
						<button class="button_confirm_order" name="button_confirm_order" type="submit">Confirm Order</button>
						<button class="button_cancel_order">Cancel</button>
					</div>	
				</div>
			</div>
		</form>
	</div>
</body>
</html>