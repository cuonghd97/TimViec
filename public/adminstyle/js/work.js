$(document).ready(function () {
    //Hiển thị lên datatable
    var table = $('#work').DataTable({
        "destroy": true,
        "ajax": {
            "url": "/admin/work",
            "dataSrc": ""
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "work_type"
            },
        ],
        "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": `<button id='btnsua' data-toggle="modal" data-target="#edit" class='btn btn-primary'><i class="fa fa-edit"></i></button>
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
    var idwork
    $('#work tbody').on('click', 'button', function() {
        let data = table.row( $(this).parents('tr') ).data()
        $('#editwork').val(data['work_type'])
        idwork = data['id']
    })

    //Sửa loại công việc
    $('#btnedit').on('click', function(e) {
        e.preventDefault();
        var data = {
            editWork: document.getElementById('editwork').value
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: 'editwork/' + idwork,
                type: 'POST',
                data: data
            })
            .done(res => {
                console.log('success')
                table.ajax.reload(null, false)
            })        
    })
    //Thêm loại công việc
    $('#btaddwork').on('click', function (e) {
        e.preventDefault();
        var data = {
            addWork: document.getElementById('addwork').value
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: 'addwork',
                type: 'POST',
                data: data
            })
            .done(res => {
                console.log('success')
                table.ajax.reload(null, false)
            })        
    })
    //Xóa loại công việc
    $('body').on('click', '.xoa', function () {
        xoa(this)
        table.ajax.reload(null, false)
    })

    function xoa(e) {
        var id = $(e).data('id');
        $.ajax({
            url: 'deletework/' + id,
            success() {
                table.ajax.reload(null, false)
            }
        })
    }
})