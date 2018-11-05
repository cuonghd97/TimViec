$(document).ready(function () {
    var table = $('#provinceslist').DataTable({
        "destroy": true,
        "ajax": {
            "url": "/admin/provinces",
            "dataSrc": ""
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "province_name"
            },
        ],
        "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": "<button>xoa</button>"
        }],
        "displayLength": 10,
    })
    $.getJSON('/admin/provinces', function (data) {
        var elements = ''
        $.each(data, function (key, entry) {
            elements = `<option>
                ${entry.province_name}
            </option>`
            $('#changeprovince').append(elements)
        })
    })

    function banghuyen() {
        $('#changeprovince').change(function () {
            var selectedProvince = $('#changeprovince').val()
            $.getJSON('/admin/districts', function (data) {
                var elements = ``
                $.each(data, function (key, entry) {
                    if (entry.province_id == selectedProvince) {
                        elements += `<tr>
                <td>${entry.id}</td>
                <td>${entry.districts_name}</td>
                <td><button>xoa</button></td>
                </tr>
                `
                        $('#districts_body').html(elements)
                    }
                })
            })
        })
    }
    //Show huyện
    banghuyen()
    //Thêm tỉnh
    $('#btaddprovince').on('click', function (e) {
        e.preventDefault();
        var data = {
            addProvince: document.getElementById('addprovince').value
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: 'addprovince',
                type: 'POST',
                data: data
            })
            .done(res => {
                table.ajax.reload(null, false)
            })
    })
    //Thêm huyện
    $('#btadddistrict').on('click', function (e) {
        e.preventDefault();
        var data = {
            addProvince: document.getElementById('changeprovince').value,
            addDistrict: document.getElementById('adddistrict').value,
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: 'adddistrict',
                type: 'POST',
                data: data
            })
            .done(res => {
                banghuyen()
            })
    })
})