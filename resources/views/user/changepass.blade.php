@extends('user.baseuser')
@section('rightPage')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<div class="col-md-7 col-sm-7">
  <div class="rows right-side">

    <div class="panel panel-default">
      <div class="panel-heading ads-hdr"><i class="fa fa-info-circle fa-fw"></i> Thay đổi mật khẩu</div>
      <div class="mat-khau" style="padding: 10px;">
        <form action="{{ route('postpass', ['id'=>$userinfo->id]) }}" method="post">
          {{ csrf_field() }}
          @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
          @endif
          <div class="rows">
            <div class="col-xs-3">
              <div class="form-control" style="border: 0;">
                Mật khẩu cũ:
              </div>
            </div>
            <div class="col-xs-7">
              <div class="form-group">
                <input type="password" class="form-control" id="currentpass" name="currentpass">
              </div>
            </div>
          </div>
          <div class="rows">
            <div class="col-xs-3">
              <div class="form-control" style="border: 0;">
                Mật khẩu mới:
              </div>
            </div>
            <div class="col-xs-7">
              <div class="form-group">
                <input type="password" class="form-control" id="newpass" name="newpass">
              </div>
            </div>
          </div>
          <div class="rows">
            <div class="col-xs-3">
              <div class="form-control" style="border: 0;">
                Nhập lại mật khẩu:
              </div>
            </div>
            <div class="col-xs-7">
              <div class="form-group">
                <input type="password" class="form-control" id="renewpass" name="renewpass">
              </div>
            </div>
          </div>
          <div class="rows">
            <center>
              <button type="submit" name="profilesm" value="Thay đổi" class="btn btn-default btn-success">Cập nhật</button>
            <center>
          </div>
        </form>
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
@endsection
