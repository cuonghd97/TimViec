$(document).ready(function () {
    var province = $('#provinces_list')
    var district = $('#districts_list')
    $.getJSON('/user/provinces-data', function (data) {
        $.each(data, function (key, entry) {
            // console.log(entry.province_name)
            province.append($('<option></option>').attr('value', entry.province_id).text(entry.province_name))
        })
    })
    $('#provinces_list').change(function(){
        // console.log($(this).val())
        $('#districts_list').find('option').remove().end().append('<option value="">--Chọn--</option>');
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


    var worktype = $('#type')
    $.getJSON('/user/typework-data', function(data) {
        $.each(data, function (key, entry) {
            worktype.append($('<option></option>').attr('value', entry.work_type).text(entry.work_type))
        })
    })

    var detail = $('#detail')
    worktype.change(function () {
        $('#detail').find('option').remove().end().append('<option value="">--Chọn--</option>')
        let work = $(this).val()
        $.getJSON('/user/detailwork-data', function (data) {
            $.each(data, function (key, entry) {
                if (work == entry.work_id)
                detail.append($('<option></option>').attr('value', entry.work_more).text(entry.work_more))
            })
        })
    })
});
