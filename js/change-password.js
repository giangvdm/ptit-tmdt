var newPasswordInput = document.getElementById("js-new-password");
var repeatPasswordInput = document.getElementById("js-repeat-password");

repeatPasswordInput.addEventListener("change", function() {
    var newPass = newPasswordInput.value;
    var repPass = repeatPasswordInput.value;
    
    if (newPass != repPass) {
        this.setCustomValidity("Xác nhận mật khẩu không khớp! Vui lòng thử lại!");
    }
    else {
        this.setCustomValidity("");
    }
});