$(document).ready(function () {
    var province = $('#provinces-list')
    var district = $('#districts-list')
    $.getJSON('/user/provinces-data', function (data) {
        $.each(data, function (key, entry) {
            // console.log(entry.province_name)
            province.append($('<option></option>').attr('value', entry.province_id).text(entry.province_name))
        })
    })
    $('#provinces-list').change(function(){
        // console.log($(this).val())
        $('#districts-list').find('option').remove().end().append('<option value="">--Chọn--</option>');
        let province = $(this).val();
        $.getJSON('/user/districts-data', function(data) {
            $.each(data, function(key, entry) {
                // console.log(province + ' ' + entry.province_id)
                if (province == entry.province_id){
                    district.append($('<option></option>').attr('value', entry.districts_name).text(entry.districts_name))
                }
            })
        })
    })

    $('#nut').on('click', function(){
        let address1 = $('#address').val()
        let address2 = $('#districts-list').val()
        let address3 = $('#provinces-list').val() 
    })
});