																	//open sign in modal
function funcSignIn() {
	document.getElementById('div_log_in').style.display="none";
	document.getElementById('div_sign_in').style.display="block";
}
																	//open log in modal
function funcLogIn() {
	document.getElementById('div_log_in').style.display="block";
	document.getElementById('div_sign_in').style.display="none";
}

function funcCloseLogIn() {
	document.getElementById('div_log_in').style.display="none";
	document.getElementById('modal_curtain').style.display="none";
}

function funcCloseSignIn() {
	document.getElementById('div_sign_in').style.display="none";
	document.getElementById('modal_curtain').style.display="none";
}