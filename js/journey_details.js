function funcBuyNow() {
	document.getElementById('modal_curtain_for_buy').style.display="block";
	document.getElementById('buyer_details').style.display="block";
}

function funcCloseBuyNow() {
	document.getElementById('modal_curtain_for_buy').style.display="none";
	document.getElementById('buyer_details').style.display="none";

	document.getElementById('input_buy_name').value="";
	document.getElementById('input_buy_address').value="";
	document.getElementById('input_buy_phone').value="";
	document.getElementById('input_buy_leaving').value="";
	document.getElementById('input_buy_departing').value="";
	document.getElementById('input_buy_gender').value="Select Your Gender";
}

function focusIn(id){
	document.getElementById(id).style.backgroundColor="green";
}
function focusOut(id){
	document.getElementById(id).style.backgroundColor="gray";
}