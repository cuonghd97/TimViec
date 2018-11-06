$(document).ready(function() {
    var table = $('#posts').DataTable({
        "destroy": true,
        "ajax": {
            "url": "/admin/postdata",
            "dataSrc": ""
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "post_id"
            },
            {
                "data": "title"
            },
        ],
        "columnDefs": [{
            "targets": 3,
            "data": null,
            "defaultContent": `<button id='btnxem' data-toggle="modal" data-target="#view" class='btn btn-primary'><i class="fa fa-eye"></i></button>
                                <a class='btn btn-danger xoa'><i class="fa fa-times"></i></a>`
        }],
        "displayLength": 10,
        createdRow: function (row, data, dataIndex) {
            $(row).find('.xoa').attr('data-id', data.id);
            $(row).find('td').attr('id', 'rowblack');
            $(row).find('button').attr('id', data.id);
            // $(row).find('a').attr('href', 'editprovince/' + data.id);
        },
    })
    $('#posts tbody').on('click', 'button', function(e) {
        var id = $(this).attr('id')
        $.ajax({
            url: "/admin/postdata",
            type: "GET",
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, entry) {
                    if (id == entry.id){
                        $('#id').text(entry.post_id)
                        $('#iduser').text(entry.user_id)
                        $('#title').text(entry.title)
                        $('#content').text(entry.content)
                        $('#typepost').text(entry.type_post)
                        $('#age').text(entry.age)
                        $('#phone').text(entry.phone)
                        $('#work').text(entry.type)
                        $('#salary').text(entry.salary)
                        $('#gender').text(entry.gender)
                        $('#address').text(entry.address + '-' + entry.district + '-' + entry.province)
                        $('#postat').text(entry.created_at)
                    }
                })
            }
        })
    })
    //Xóa bài đăng
    $('body').on('click', '.xoa', function () {
        xoa(this)
    })

    function xoa(e) {
        var id = $(e).data('id');
        $.ajax({
            url: 'deletepost/' + id,
            success() {
                // getTable();
                table.ajax.reload(null, false)
            }
        })
    }

})