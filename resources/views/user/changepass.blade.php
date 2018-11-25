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
@endsection
