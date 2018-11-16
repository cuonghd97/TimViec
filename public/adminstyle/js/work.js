$(document).ready(function () {
    $.ajax({
        url: '/admin/work-data',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var element = ``
            $.each(data, function (key, entry) {
                element += `<option> ${entry.work_type}</option>`
                $('#listwork').html(element)
            })
        }
    })
    $('#listwork').change(function () {
        var cwork = $(this).val()
        $('#workbody').find('tr').remove().end()
        $.ajax({
            url: '/admin/workdetail-data',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var element=``
                $.each(data, function (key, value) {
                    if (value.work_id == cwork) {
                        element += `<tr>
                        <td>${value.work_more}</td>
                        <td><button id=${value.id} class='btn btn-danger btdelete'>
                        <i class='fa fa-times'></i></button></td>
                        </tr>`
                        $('#workbody').html(element)
                    }
                })
            }
        })
    })

    $('#btnaddmore').on('click', function () {
        var work = $('#listwork').val()
        var data = {
            addBigWork: work,
            addWork: document.getElementById('more').value
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
                url: 'add-work-detail',
                type: 'POST',
                data: data
            })
            .done(res => {
                $('#more').val('')
                $('#more').focus()
                $.ajax({
                    url: '/admin/workdetail-data',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var element=``
                        $.each(data, function (key, value) {
                            if (value.work_id == $('#listwork').val()) {
                                element += `<tr>
                        <td>${value.work_more}</td>
                        <td><button id=${value.id} class='btn btn-danger btdelete'>
                        <i class='fa fa-times'></i></button></td>
                        </tr>`
                                $('#workbody').html(element)
                            }
                        })
                    }
                })
            })
    })
    $('#workbody').on('click', '.btdelete', function () {
        xoa(this)
    })
    function xoa(e) {
        var id = $(e).attr('id')
        $.ajax({
            url: 'delete-work-data/' + id,
            success() {
                $.ajax({
                    url: '/admin/workdetail-data',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#workbody').find('tr').remove().end()
                        var element = ``
                        $.each(data, function (key, value) {
                            if (value.work_id == $('#listwork').val()) {
                                element += `<tr>
                        <td>${value.work_more}</td>
                        <td><button id=${value.id} class='btn btn-danger btdelete'>
                        <i class='fa fa-times'></i></button></td>
                        </tr>`
                                $('#workbody').html(element)
                            }
                        })
                    }
                })
            }
        })
    }
})
