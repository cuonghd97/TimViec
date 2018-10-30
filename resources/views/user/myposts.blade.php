@extends('user.baseuser')
<link rel="stylesheet" href="https://697f684f1.vws.vegacdn.vn/rvn/account.css?v2018.10.21.1" type="text/css" media="all" />
@section('rightPage')
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default" style="margin-top: 0px;">
            <div class="panel-heading ads-hdr"><i class="fa fa-list-ol"></i> Danh sách các bài đăng</div>
            <div class="tai-khoan">
                <div class="rows clearfix user-ads">
                    <div class="col-md-8">
                        <div class="rvn-item-no" id=""><span class="badge">V</span></div>
                        <div class="ad-title"><a href="" id="titlepost">
                                <!--Tiêu đề--></a></div>
                        <div class="ad-stats"><i class="fa fa-clock-o"></i> <!--Ngày tạo--> 
                            <i class="fa fa-eye"></i>
                            <!--Số lượt xem-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="a-btn text-right">
                            <a title="Chỉnh sửa"><i class="fa fa-pencil-square fa-fw" style="color: blue;"></i></a>
                            <a title="Xóa tin"> <i class="fa fa-trash-o fa-fw" style="color: red;"></i></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
    $.ajax({
        url: "posts-data",
        method: "GET",
        dataType: "json",
        success: function (data) {
            var ptag = $('#exampledata')
            var putdata = ''
            $.getJSON('posts-data', function (data) {
                $.each(data, function (key, entry) {
                    $('#titlepost').text(entry.title)
                })
            })

        },
        error: function () {
            console.log('failure')
        }
    })
</script>
@endsection