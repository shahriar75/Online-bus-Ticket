function filterBusesTable() {
	var all_buses_table_filter = document.getElementById("all_buses");
	var all_buses_table_row_filter = all_buses_table_filter.getElementsByTagName("tr");

	var select_option_starting = document.getElementById("filter_input_starting");
	var select_filter_starting = select_option_starting.value.toUpperCase();
	var all_buses_table_data_starting, text_value_starting;

	var select_option_destination = document.getElementById("filter_input_destination");
	var select_filter_destination = select_option_destination.value.toUpperCase();
	var all_buses_table_data_destination, text_value_destination;

	var select_option_coach = document.getElementById("filter_input_coach");
	var select_filter_coach = select_option_coach.value.toUpperCase();
	var all_buses_table_data_coach, text_value_coach;

	var select_option_company = document.getElementById("filter_input_company");
	var select_filter_company = select_option_company.value.toUpperCase();
	var all_buses_table_data_company, text_value_company;

	dependentFilterReset(select_option_starting);
	dependentFilterReset(select_option_destination);
	dependentFilterReset(select_option_company);

	for (var i = 0; i < all_buses_table_row_filter.length; i++) {
		all_buses_table_data_starting = all_buses_table_row_filter[i].getElementsByTagName("td")[2];
		all_buses_table_data_destination = all_buses_table_row_filter[i].getElementsByTagName("td")[3];
		all_buses_table_data_coach = all_buses_table_row_filter[i].getElementsByTagName("td")[6];
		all_buses_table_data_company = all_buses_table_row_filter[i].getElementsByTagName("td")[0];

		if (all_buses_table_data_starting && all_buses_table_data_destination) {
			text_value_starting = all_buses_table_data_starting.textContent || all_buses_table_data_starting.innerText;
			text_value_destination = all_buses_table_data_destination.textContent || all_buses_table_data_destination.innerText;
			text_value_coach = all_buses_table_data_coach.textContent || all_buses_table_data_coach.innerText;
			text_value_company = all_buses_table_data_company.textContent || all_buses_table_data_company.innerText;

			if (text_value_starting.toUpperCase().indexOf(select_filter_starting) > -1 && 
				text_value_destination.toUpperCase().indexOf(select_filter_destination) > -1 &&
				text_value_coach.toUpperCase().indexOf(select_filter_coach) > -1 &&
				text_value_company.toUpperCase().indexOf(select_filter_company) > -1)  {

				all_buses_table_row_filter[i].style.display = "";
			
				dependentFilterShow(text_value_starting, select_option_starting);
				dependentFilterShow(text_value_destination, select_option_destination);
				dependentFilterShow(text_value_company, select_option_company);
			}
			else {
				all_buses_table_row_filter[i].style.display = "none";
			}
		}
	}
}

function dependentFilterShow(td, select) {
	for (var i = 0; i < select.length; i++) {
		var x = select.options[i].value;
		if (x == td) {
			select.options[i].hidden = false;
			break;
		}
	}
}

function dependentFilterReset(select) {
	for (var i = 1; i < select.length; i++) {
		var x = select.options[i].value;
		select.options[i].hidden = true;
	}
}