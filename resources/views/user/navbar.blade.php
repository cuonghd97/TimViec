<!DOCTYPE html>
<html>

<head>
    <title>Tìm người giúp việc</title>
    <script src="https://697f684f1.vws.vegacdn.vn/rvn/init.js?v2018.10.15.7" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ asset('logotitle.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
</head>

<body class="htmlContent">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <div id="prloading"><span class="ld-text"><img src="{{ asset('images/connecting.gif') }}" width="48"
                            border="0"></span></div>
                <div class="notification-nav visible-xs">
                    <div class="notification notification-button pull-right" data-original-title="" title=""><a
                            tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom"><i
                                class="fa fa-bell fa-fw bottom"></i><span class="count animated fadeIn notificount"
                                style="display: none"></span></a></div>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand reload" href="/user/allposts"><img src="/images/logo.png" width="80" border="0" height="42"></a>


            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right bar-top">
                    <li class="visible-xs"><a href="/tim-kiem"><i class="fa fa-search fa-fw" aria-hidden="true"></i>
                            Tìm kiếm</a>
                    </li>

                    <li><a href="/help"><i class="fa fa-question-circle-o fa-fw"></i>
                            <span class="visible-md-inline visible-lg-inline visible-xs-inline">
                                Hướng dẫn</span>
                        </a>
                    </li>
                    <li class="rvn-blue">
                        <a href="https://facebook.com/duccuongdc97" target="_blank"><i class="fa fa-facebook-official fa-fw rvn-blue"></i><span
                                class="visible-md-inline visible-lg-inline visible-xs-inline"> fb.me</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ action('userController@info', ['id'=>Auth::guard('user')->user()->id]) }}">
                            <img title="Thông tin người dùng" data-container="body" data-placement="bottom" src="{{ asset(Auth::guard('user')->user()->user_avatar) }}"
                                class="img-fluid img-circle" alt="" style="width: 30px; height: 30px;" data-toggle="popover"
                                data-trigger="hover" data-popover-content="#list-popover">
                        </a>
                        <!--Khi hover vào thì hiện ra thông tin người dùng-->
                        <div id="list-popover" style="display:none">
                            <ul class="nav nav-pills nav-stacked">
                                <li><span><i class="fa fa-info-circle"></i> {{Auth::guard('user')->user()->name}}</span></li>
                                <li><span><i class="fa fa-envelope"></i> {{Auth::guard('user')->user()->email}}</span></li>
                                <li><span><i class="fa fa-clock-o"></i>
                                        {{Auth::guard('user')->user()->last_sign_in_at}}</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ action('userController@info', ['id'=>Auth::guard('user')->user()->id]) }}">
                            <!--<span class="visible-md-inline visible-lg-inline visible-xs-inline">
                                Hello, {{ Auth::guard('user')->user()->name }}
                            </span>-->
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right bar-bellow">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="fa fa-server fa-fw" aria-hidden="true"></i> Thông tin <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('dangtin') }}"><i class="fa fa-commenting fa-fw rvn-blue"></i> Đăng
                                    tin</a></li>
                            <li><a href="{{ route('user.myposts') }}"><i class="fa fa-wpforms fa-fw"></i> Chỉnh sửa bản tin</a></li>
                            <li role="separator" class="divider hidden"></li>
                            <li>
                                <a href="{{ action('userController@info', ['id'=>Auth::guard('user')->user()->id]) }}"><i class="fa fa-user fa-fw"></i>
                                    Thông tin tài khoản
                                </a>
                            </li>
                            <li><a href="{{ action('userController@idchangepass', ['id'=>Auth::guard('user')->user()->id]) }}"><i class="fa fa-key fa-fw"></i> Đổi mật khẩu</a></li>
                            <li>
                                <a href="{{ route('login') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw red"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Các bản tin được hiển thị ở đây-->

    <!--Kết thúc hiển thị-->

    @section('pgContent')

    @show
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="/bootstrap/dist/js/jquery.min.js"><\/script>')
    </script>
    <script src="https://697f684f1.vws.vegacdn.vn/rvn/index.js?v2018.10.15.7"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                html: true,
                content: function () {
                    var elementId = $(this).attr("data-popover-content");
                    return $(elementId).html();
                }
            });
        });
    </script>
</body>

</html>
