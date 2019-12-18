<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<body>
	<!-- here is date picker-->
	<div id="date_picker_opener" class="date_picker_opener" onclick="datePickerOpenerCloser()">
		<span id="date_picker_opener_date" style="color: black">Choose Date</span>
		<img id="date_picker_common_close" class="date_picker_opener_icon" src="theme/date picker/icon.png"></div>
	<div id="date_picker_container" class="date_picker_container">
		<div class="date_selector">
			<select id="date_picker_month" class="select_for_date_picker" onchange="datePickerPlotAllDate()">
				<option value="1">Jan</option>
				<option value="2">Feb</option>
				<option value="3">Mar</option>
				<option value="4">Apr</option>
				<option value="5">May</option>
				<option value="6">Jun</option>
				<option value="7">Jul</option>
				<option value="8">Aug</option>
				<option value="9">Sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
			</select>
			<select id="date_picker_year" class="select_for_date_picker" onchange="datePickerPlotAllDate()" style="margin-left:2%;">
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
			</select>
		</div>
		<div class="date_picker_body">
			<table id="date_picker" class="date_picker">
				<tr>
					<th id="date_picker_common_close">Sat</th>
					<th id="date_picker_common_close">Sun</th>
					<th id="date_picker_common_close">Mon</th>
					<th id="date_picker_common_close">Tue</th>
					<th id="date_picker_common_close">Wed</th>
					<th id="date_picker_common_close">Thur</th>
					<th id="date_picker_common_close">Fri</th>
				</tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		datePickerSetSelectedLocalDate();
		datePickerPlotAllDate();
	</script>
</body>
</html>