function datePickerPlotAllDate() {
	datePickerReset();
	var date_counter = 1;
	var flag = 1;
	var month = getMonthFromSelect();
	var year = getYearFromSelect();

	for (var i = datePickerPlotterStarterGetFirstDayOfMonth(month,year); i < 7; i++) {		//// plotting 1st week
		var single_cell = document.getElementById("date_picker").rows[1].cells;			//// 
		single_cell[i].innerHTML = date_counter;										////
		single_cell[i].addEventListener("click", datePickerPickDate);
		single_cell[i].addEventListener("mouseover", datePickerCurrentMonthMouseOver);
		single_cell[i].addEventListener("mouseout", datePickerCurrentMonthMouseOut);
		date_counter++;
	}

	for (var i = 2; i < 7; i++) {
		for (var j = 0; j < 7; j++) {
			if (date_counter == (datePickerGetDaysInMonth(month,year) + 1)) {
				flag = 0;
				date_counter = 1;
			}
			var single_cell = document.getElementById("date_picker").rows[i].cells;
			single_cell[j].innerHTML = date_counter;
			if (flag) {
				single_cell[j].addEventListener("click", datePickerPickDate);
				single_cell[j].addEventListener("mouseover", datePickerCurrentMonthMouseOver);
				single_cell[j].addEventListener("mouseout", datePickerCurrentMonthMouseOut);
			}
			else {
				single_cell[j].style.backgroundColor = "#4E4E4E";
			}
			date_counter++;
		}
	}
}

function datePickerPlotterStarterGetFirstDayOfMonth(month, year) {
	var x = month + " 1, " + year;				// date format
	var d = new Date(x);
	var week = [1,2,3,4,5,6,0];			// convert date format by considering satarday as first day of week
	return week[d.getDay()];
}

function datePickerGetDaysInMonth(month, year) {
	return new Date(year, month, 0).getDate();
}

function datePickerCurrentMonthMouseOver() {
	this.style.backgroundColor = "slateblue";
	if (this.cellIndex == 6) {  /// get orangered colored element
		this.style.color = "white";
	}
}

function datePickerCurrentMonthMouseOut() {
	this.style.backgroundColor = "#444444";
	if (this.cellIndex == 6) {  /// get orangered colored element
		this.style.color = "orangered";
	}
}

function getMonthFromSelect() {
	var x = document.getElementById("date_picker_month");
	var month = x.options[x.selectedIndex].value;
	return month;
}

function getYearFromSelect() {
	var x = document.getElementById("date_picker_year");
	var year = x.options[x.selectedIndex].value;
	return year;
}

function datePickerReset() {
	for (var i = 1; i < 7; i++) {
		for (var j = 0; j < 7; j++) {
			var single_cell = document.getElementById("date_picker").rows[i].cells;
			single_cell[j].removeEventListener("click", datePickerPickDate);
			single_cell[j].removeEventListener("mouseover", datePickerCurrentMonthMouseOver);
			single_cell[j].removeEventListener("mouseout", datePickerCurrentMonthMouseOut);
			single_cell[j].style.backgroundColor = "#444444";
			single_cell[j].innerHTML = " ";
		}
	}
}

function datePickerPickDate() {
	var month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
	document.getElementById("date_picker_opener_date").innerHTML = 
	this.innerHTML + " " + month[getMonthFromSelect()-1] + ", " + getYearFromSelect() + " ";
}

function datePickerOpenerCloser() {
	var x = document.getElementById("date_picker_container").style.display;
	if (x == 'block') {
		document.getElementById("date_picker_container").style.display = "none";
	}
	else {
		document.getElementById("date_picker_container").style.display = "block";
	}
}

function datePickerSetSelectedLocalDate(){
	var x = document.getElementById("date_picker_month");
	var y = document.getElementById("date_picker_year");
	var d = new Date();
	var month = d.getMonth() + 1;
	var year = d.getFullYear();

	for (var i = 0; i < x.length; i++) {
		if (x[i].value == month) {
			x[i].selected = "true";
			break;
		}
	}

	for (var i = 0; i < y.length; i++) {
		if (y[i].value == year) {
			y[i].selected = "true";
			break;
		}
	}
}

window.onload = function() {
	var x = document.getElementById("date_picker_container");
	document.onclick = function(event) {
		if (event.target.id !== 'date_picker_opener' && event.target.id !== 'date_picker_opener_date' &&
			event.target.id !== 'date_picker_container' && event.target.id !== 'date_picker_month' &&
			event.target.id !== 'date_picker_year' && event.target.id !== 'date_picker_common_close') {
			x.style.display = 'none';
		}
	};
};

//window.onload = "datePickerCloseAtOutsideClick()";