@extends('user.baseuser')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@section('rightPage')
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default">
            <div class="panel-heading ads-hdr">
                <i class="fa fa-info-circle fa-fw"></i> Đăng ký nhận tin mới nhất
            </div>
            <div class="row row-post">
              <div class="col-xs-8">
                <div class="form-group">
                  {{ csrf_field() }}
                  <input type="hidden" name="iduser" id="iduser" value="{{ $data->user_id }}">
                  <label for="regwork">Chọn thể loại:</label>
                  <select class="form-control" id="regwork">

                  </select>
                </div>
                <button class="btn btn-primary" id="sign">Đăng ký</button>
              </div>
            </div>
            <br>
            <div class="row row-post clearfix">
              <div class="col-xs-8">
                <h4>Danh sách đã đăng ký:</h4>
                <table id="noted" class="table" style="width: 100%">

                </table>
              </div>
            </div>

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
<script src="{{ asset('js/main.js') }}"></script>
<script>
  $(document).ready(function() {
    var userid = '{{ $data->user_id }}'
    function loadnot() {
      $.ajax({
        type: 'GET',
        url: '/user/not-data',
        dataType: 'json',
        success: function(data) {
          var elements = ``
          $.each(data, function(key, value) {
            if (value.user_id == userid) {
              elements += `<tr>
                            <td style="vertical-align: middle;">${value.work}</td>
                            <td align="right"><button data-id=${value.id} class='btn btn-danger' id='btnhuy'>Hủy</button></td>
                          </tr>`
            }
            $('#noted').html(elements)
          })
        }
      })
    }
    loadnot()
    $.ajax({
      type: 'GET',
      url: '/user/typework-data',
      dataType: 'json',
      success: function(data) {
        var elements = ``
        $.each(data, function(key, value) {
          elements += `<option>
                              ${value.work_type}
                          </option>`
          $('#regwork').html(elements)
        })
      }
    })
    $('body').on('click', '#btnhuy', function() {
      xoa(this)
    })
    function xoa(e) {
      var id = $(e).data('id');
      $.ajax({
          url: '/user/del-not/' + id,
          success() {
            loadnot()
          }
      })
    }
    $('#sign').on('click', function(e) {
      e.preventDefault();
      var data = {
          addwork: document.getElementById('regwork').value,
          adduser: document.getElementById('iduser').value
      }
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
              url: '/user/addnotification',
              type: 'POST',
              data: data,
              success: function(){
                loadnot()
              }
          })
    })
  })
</script>
@endsection
