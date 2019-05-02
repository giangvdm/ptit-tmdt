var myInput = document.getElementById("input");
var message = document.getElementById("message");
var ok = document.getElementById("ok");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
	document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
    // Validate length
    if (myInput.value.length >= 8) {
        message.classList.remove("alert-danger");
        message.classList.add("alert-success");
        ok.innerHTML = "Đạt yêu cầu !";
    } else {
        message.classList.remove("alert-success");
        message.classList.add("alert-danger");
        ok.innerHTML = "Mật khẩu chưa đạt yêu cầu !!!";
    }
}