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
                        <div class="rvn-item-no" id="notify6962804"><span class="badge">V</span></div>
                        <div class="ad-title"><a href="/xem/6962804-Sinh-vien-can-thuc-tap.html" id="title6962804">Sinh
                                viên cần thực tập</a></div>
                        <div class="ad-stats"><i class="fa fa-clock-o"></i> 03/10/2018 <i class="fa fa-eye"></i> 57 <i class="fa fa-picture-o fa-fw"></i>
                            <span class="pic-num">0</span> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="a-btn text-right">
                            <a title="Chỉnh sửa" href="/dang-tin?mode=edit&amp;siteid=6962804&amp;v=text"><i class="fa fa-pencil-square fa-fw" style="color: blue;"></i></a>
                            <a title="Xóa tin" data-toggle="modal" data-id="6962804" data-target="#confirm-delete" href="#"
                                data-href="/quan-ly?mode=delete&amp;siteid=6962804"><i class="fa fa-trash-o fa-fw" style="color: red;"></i></a>
                            <!--<a title="Gia hạn" href="#" data-id="6962804" data-toggle="modal" data-target="#confirm-renew"><i class="fa fa-retweet fa-fw"></i></a>-->
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
@endsection