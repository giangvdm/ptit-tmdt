var addressUpdateFields = document.getElementsByClassName("js-address-update");

for (var i = 0; i < addressUpdateFields.length; i++) {
    addressUpdateFields[i].addEventListener("change", function() {
        if (this.value == "") {
            for (var j = 0; j < addressUpdateFields.length; j++) {
                addressUpdateFields[j].required = false;
            }
        }
        else {
            for (var j = 0; j < addressUpdateFields.length; j++) {
                addressUpdateFields[j].required = true;
            }
        }
    });
}