@extends('user.baseuser')
<link rel="stylesheet" href="https://697f684f1.vws.vegacdn.vn/rvn/account.css?v2018.10.21.1" type="text/css" media="all" />
@section('rightPage')
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default" style="margin-top: 0px;">
            <div class="panel-heading ads-hdr"><i class="fa fa-list-ol"></i> Danh sách các bài đăng</div>
            <div class="tai-khoan" id="tai_khoan">

                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<script>
    function reloadajax() {
        $.ajax({
            url: "posts-data",
            method: "GET",
            dataType: "json",
            success: function (data) {
                var putdata = ''
                $.getJSON('posts-data', function (data) {
                    var elements = ''
                    $.each(data, function (key, entry) {
                        elements = '<div class="rows clearfix user-ads">' +
                        '<div class="col-md-8">' +
                            '<div class="rvn-item-no" id=""><span class="badge"><i class="fa fa-file"></i></span></div>' +
                            '<div class="ad-title"><a href="" id="titlepost">' +
                                    entry.title + '</a></div>' +
                            '<div class="ad-stats"><i class="fa fa-clock-o"></i>' + entry.created_at +
                                '<i class="fa fa-eye"></i>' +
                                entry.views +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-4">' +
                            '<div class="a-btn text-right">' +
                                '<a title="Chỉnh sửa" href="/user/editpost/' + entry.id + '" data-id=' + entry.id + '><i class="fa fa-pencil-square fa-fw" style="color: blue;"></i></a>' +
                                '<a title="Xóa tin" class="xoa" data-id=' + entry.id + '> <i class="fa fa-trash-o fa-fw" style="color: red;"></i></a>' +
                            '</div>' +
                        '</div>' +
                        '<div class="clearfix"></div>' +
                    '</div>'
                    $('#tai_khoan').append(elements)
                    })
                })
            },
            error: function () {
                console.log('failure')
            }
        })
    }
    reloadajax()
    $('body').on('click', '.xoa', function() {
        xoa(this)
    })

    function xoa(e) {
        var id = $(e).data('id')
        $.ajax({
            url: '/user/deletepost/' + id,
            success(){
                $('#tai_khoan').empty()
                reloadajax()
                console.log('done')
            }
        })
    }
</script>
@endsection
