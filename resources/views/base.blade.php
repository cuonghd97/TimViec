<!DOCTYPE html>
<html>

<head>
  <title>Tim nguoi giup viec</title>
  <script src="https://697f684f1.vws.vegacdn.vn/rvn/init.js?v2018.10.15.7" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
</head>

<body class="htmlContent">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <div id="prloading"><span class="ld-text"><img src="/images/connecting.gif" width="48" border="0"></span></div>
        <div class="notification-nav visible-xs">
          <div class="notification notification-button pull-right" data-original-title="" title=""><a tabindex="0" role="button"
              data-toggle="popover" data-trigger="focus" data-placement="bottom"><i class="fa fa-bell fa-fw bottom"></i><span
                class="count animated fadeIn notificount" style="display: none"></span></a></div>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand reload" href="/"><img src="/images/logo.png" width="80" height="42" border="0" style="margin-top: -6px;"></a>


      </div>
      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-right bar-top">

          <li class="visible-xs"><a href="/tim-kiem"><i class="fa fa-search fa-fw" aria-hidden="true"></i> Tìm kiếm</a></li>

          <li><a href="/help"><i class="fa fa-question-circle-o fa-fw"></i><span class="visible-md-inline visible-lg-inline visible-xs-inline">
                Hướng dẫn</span></a></li>
          <li class="rvn-blue"><a href="https://facebook.com/raovat2000" target="_blank"><i class="fa fa-facebook-official fa-fw rvn-blue"></i><span
                class="visible-md-inline visible-lg-inline visible-xs-inline"> fb.me</span></a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right bar-bellow">

          <li>
            <a href="{{ route('login') }}" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o fa-fw"
                aria-hidden="true"></i> Đăng nhập</a>
          </li>
          <li>
            <a href="{{ route('register') }}" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o fa-fw"
                aria-hidden="true"></i> Đăng ký</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @section('pgContent')

  @show
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="/bootstrap/dist/js/jquery.min.js"><\/script>')
  </script>
  <script src="https://697f684f1.vws.vegacdn.vn/rvn/index.js?v2018.10.15.7"></script>
</body>

</html>
