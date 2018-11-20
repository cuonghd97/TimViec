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
<footer class="footer">
        <div class="container">
            <div class="rows ftr-4cols hidden-xs clearfix">
                <div class="col-md-3 col-sm-4">
                    <div class="ftr-title">Thông tin liên hệ</div>

                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="ftr-title">Thông tin về trang web</div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="ftr-title">Hướng dẫn</div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="ftr-title">Liên kết ưu tiên</div>
                </div>
            </div>
            <div class="rows hidden-xs clearfix">
                <div class="col-md-3 col-sm-4">

                    <div class="ftr-content">
                        Địa chỉ: Nguyên Xá, Minh Khai, Bắc Từ Liêm, Hà Nội<br>ĐT: 0343944610<br>Email: <a href="mailto:duccuongdc97@gmail.com"
                            class="" classname="" target="_blank" name="">duccuongdc97@gmail.com</a>
                        <div class="fb-icon"><a target="_blank" href="https://www.facebook.com/duccuongdc97">
                                <i class="fa fa-facebook-official fa-2x"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="ftr-content">
                        <div><a href="/faq25/Quy-che-hoat-dong.html"><i class="fa fa-caret-right fa-fw"></i> Quy chế hoạt
                                động</a></div>
                        <div><a href="/faq23/Chinh-sach-bao-mat-thong-tin.html"><i class="fa fa-caret-right fa-fw"></i>
                                Chính sách bảo mật thông tin</a></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="ftr-content">
                        <div><a href="/faq27/Huong-dan-dang-ky-thanh-vien.html"><i class="fa fa-caret-right fa-fw"></i>
                                Hướng dẫn đăng ký thành viên</a></div>
                        <div><a href="/faq28/Huong-dan-dang-tin.html"><i class="fa fa-caret-right fa-fw"></i> Hướng dẫn
                                đăng tin</a></div>

                    </div>
                </div>
            </div>
            <div class="ftr">
                <div class="ftrCopyright">
                    <div class="CopyrightText">Bài tập lớn môn phát triển phần mềm hướng dịch vụ Trường Đại Học Công Nghiệp
                        Hà Nội</div>
                </div>
            </div>
        </div>
    </footer>
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
