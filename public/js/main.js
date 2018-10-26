$(document).ready(function () {
    var province = $('#provinces-list')
    var district = $('#districts-list')
    $.getJSON('/user/provinces-data', function (data) {
        $.each(data, function (key, entry) {
            console.log(entry.province_name)
            province.append($('<option>bc</option>').attr('value', entry.province_id).text(entry.province_name))
        })
    })
    $('#provinces-list').change(function(){
        // console.log($(this).val())
        let province = $(this).val();
        $.getJSON('/user/districts-data', function(data) {
            $.each(data, function(key, entry) {
                if ()
            })
        })
    })
});