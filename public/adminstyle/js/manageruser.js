$(document).ready(function () {
    var table = $('#usersdata').DataTable({
        "destroy": true,
        "ajax": {
            "url": "/admin/users-data",
            "dataSrc": ""
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "name"
            },
            {
                "data": "email"
            },
        ],
        "columnDefs": [{
            "targets": 3,
            "data": null,
            "defaultContent": "<button id='info' style='margin: 5px;' class='xem btn btn-info'><i class='fa fa-eye'></i></button><button class='xoa btn btn-danger'><i class='fa fa-times'></i></button>"
        }],
        createdRow: function (row, data, dataIndex) {
            $(row).find('.xoa').attr('data-id', data.id).attr('id', 'xoa');
            $(row).find('td').attr('id', 'rowblack');
            $(row).find('a').attr('href', 'edit/' + data.id);
            $(row).find('#info').attr('data-toggle', 'modal');
            $(row).find('#info').attr('data-target', '#infouser');
        },
    })
    $('tbody').on( 'click', '#info', function () {
        let data = table.row( $(this).parents('tr') ).data();
        $("#id").text(data['id']);
        $("#name").text(data['name']);
        $("#email").text(data['email']);
        $("#gender").text(data['user_gender']);
        $("#address").text(data['user_address'] + '-' + data['user_district'] + '-' +data['user_province']);
        $("#birthday").text(data['user_birthday']);
        $("#phone").text(data['user_phone']);
    } );
    $('body').on('click', '#xoa', function() {
        r = confirm('Bạn có muốn xóa?')
        if (r == true)
        xoa(this)
    })
    // $('body').on('click', '.xoa', function () {
    //     xoa(this);
    //     // getTable();
    // });

    function xoa(e) {
        var id = $(e).data('id');
        $.ajax({
            url: 'admin/deleterow/' + id,
            success() {
                // getTable();
                table.ajax.reload(null, false)
            }
        })
    }

});