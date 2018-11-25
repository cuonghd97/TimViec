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

@endsection
