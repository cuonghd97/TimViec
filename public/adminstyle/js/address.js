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
            "defaultContent": `<a class='btn btn-danger xoatinh'><i class="fa fa-times"></i></a>`
        }],
        "displayLength": 10,
        createdRow: function (row, data, dataIndex) {
            $(row).find('.xoatinh').attr('data-id', data.id);
            $(row).find('td').attr('id', 'rowblack');
            // $(row).find('a').attr('href', 'editprovince/' + data.id);
        },
    })

    function provincedropdown() {
        $.ajax({
            url: '/admin/provinces',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var elements = ``
                $.each(data, function (key, entry) {
                    elements += `<option>
                            ${entry.province_name}
                        </option>`
                    $('#changeprovince').html(elements)
                })
            }
        })
    }

    provincedropdown()

    function loaddistricts() {
        var selectedProvince = $('#changeprovince').val()
        $.ajax({
            url: '/admin/districts',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var elements = ``
                $.each(data, function (key, entry) {
                    if (entry.province_id == selectedProvince) {
                        elements += `<tr>
        <td>${entry.id}</td>
        <td>${entry.districts_name}</td>
        <td><a id=${entry.id} class='btn btn-danger xoahuyen'><i class="fa fa-times"></i></a></td>
        </tr>
        `
                        $('#districts_body').html(elements)
                    }
                })
            }
        })
    }
    $('#changeprovince').change(function () {
        loaddistricts()
    })
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
                $('#addprovince').val('')
                $('#addprovince').focus()
                table.ajax.reload(null, false)
                provincedropdown()
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
                $('#adddistrict').val('')
                $('#adddistrict').focus()
                var selectedProvince = $('#changeprovince').val()
                loaddistricts()
            })
    })
    //Xóa tỉnh
    $('body').on('click', '.xoatinh', function () {
        xoa(this)
        provincedropdown()
    })

    function xoa(e) {
        var id = $(e).data('id');
        $.ajax({
            url: 'deleteprovince/' + id,
            success() {
                // getTable();
                table.ajax.reload(null, false)
            }
        })
    }

    //Xóa huyện
    $('body').on('click', '.xoahuyen', function() {
        xoahuyen(this)
    })

    function xoahuyen(e) {
        var id = $(e).attr('id')
        $.ajax({
            url: 'deletedistrict/' + id,
            success() {
                loaddistricts()
            }
        })
    }
})