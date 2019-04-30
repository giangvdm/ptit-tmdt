$('.js-location-select').on('change', function() {
    var keySelect = this.name;
    $.post("model/addressDao.php", {
            key: this.name,
            value: this.value
        })
        .done(function(data) {
            if (keySelect == "province") {
                $("#district-select").html(data);
            } else if (keySelect == "district") {
                $("#ward-select").html(data);
            }
        })
        .fail(function() {
            alert("Đã có lỗi xảy ra. Vui lòng chọn lại!");
        });
});