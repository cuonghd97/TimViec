@extends('user.navbar')
@section('pgContent')
<div id="pgContent" class="clearfix container">
    <div class="clearfix"></div>
    <div class="alert alert-success" style="margin-top: 50px;">
        Bạn đã đăng nhập thành công vào hệ thống!
    </div>
    <div class="hello">
        <div class="welcome badge"><i class="fa fa-commenting-o fa-lg"></i> Xin chào! Chúc bạn có một ngày làm việc vui
            !</div>

        <div class="welcome">
            <div>
                <div class="avatar-img32" id="usrAvt" data-original-title="" title="" style="width: 65px;">
                    <img src="{{asset(Auth::guard('user')->user()->user_avatar)}}" alt="avatar" border="0" style="height: 50px; width:50px;">
                    </a>
                </div>
            </div>
            <h1>{{Auth::guard('user')->user()->name}}</h1>
        </div>

    </div>
    <blockquote class="help">
        <div class="h-msg">Mọi thắc mắc và ý kiến, hãy liên hệ với chúng tôi.</div>
        <div class="h-msg">Chúng tôi mong bạn tìm được công việc/người vừa ý khi sử dụng dịch vụ.</div>
        <footer class="small">Nếu đây là lần đầu tiên sử dụng, bạn nên thay đổi mật khẩu dễ nhớ hơn để tiện cho việc sử
            dụng.</footer>
    </blockquote>
    <div style="padding:10px 3px 10px 10px">
            <a href="{{ route('user.allposts') }}" class="btn btn-default btn-primary alert-info" >Nhấn
                vào để tiếp tục <i class="fa fa-share"></i> </a>
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
@endsection