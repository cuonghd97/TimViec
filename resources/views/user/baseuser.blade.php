@extends('user.navbar')
@section('pgContent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div id="pgContent" class="clearfix">

    <div class="container pgBody">
        <div class="rows">
            <div class="col-md-3 col-sm-5">
                <div id="sidebar" class="panel panel-default hidden-xs">
                    <div class="panel-heading">
                        <div class="panel-title sb-name"><span class="badge">{{ Auth::guard('user')->user()->name }}</span> </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="list-menu">
                            <a href="{{ route('user.myposts') }}"><i class="fa fa-wpforms fa-fw"></i> Chỉnh sửa bản tin
                            </a>
                        </li>
                        <li class="list-menu">
                            <a href="{{ route('notification', ['id'=>Auth::guard('user')->user()->id]) }}"><i class="fa fa-get-pocket fa-fw"></i> Đăng ký nhận tin mới
                            </a>
                        </li>
                        <li class="list-menu">
                            <a href="{{ route('dangtin') }}"><i class="fa fa-commenting fa-fw"></i> Đăng tin
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="list-menu">
                            <a href="{{ action('userController@info', ['id'=>Auth::guard('user')->user()->id]) }}"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản
                            </a>
                        </li>
                        <li class="list-menu">
                            <a href="{{ action('userController@idchangepass', ['id'=>Auth::guard('user')->user()->id]) }}"><i class="fa fa-key fa-fw"></i> Đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </li>
                    </ul>
                </div>

            </div>
            @section('rightPage')
            @show



        </div>
    </div>


</div>
<!--<script>
    $('.list-menu').click(function(e){
        e.preventDefault()
        $(this).toggleClass('bg-success')
    })
        bg-success

</script>-->
@endsection
