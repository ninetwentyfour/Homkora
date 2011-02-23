//write the timer to the time input in add timer on form submit
function checkForm(frm) {
	frm.submit.disabled=true;
	var o = $('div.display').text();
	//alert(o);
	if (o){
		document.getElementById("TimerTime").value = o;
		return true; //returns true if all validation passes
	}else{
		alert('Please Add Feedback before requesting a revision');
		return false;
	}
}