// Get the modal
var modalLogIn = document.getElementById('div_log_in');
var para = document.getElementById('me');

// When the user clicks anywhere outside of the modal, close it
// credit: w3schools
/*window.onclick = function(event) {
    if (event.target == modalLogIn) {
        modalLogIn.style.display = 'none';
    }
}
*/
function myFunctuion(event) {
    para.innerHTML = event.target.id + "<br>" + modalLogIn;
    if (event.target != modalLogIn) {
    	modalLogIn.style.display = 'none';
    }
}
window.onclick =function() {myFunctuion(event);}