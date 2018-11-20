<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h2>Xin chào</h2>
    <br/>
    <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ tài khoản của bạn.</p>
      Nhấn vào liên kết để đặt lại mật khẩu: <a class="btn btn-primary" href="{{ route('reset.with.token', ['token' => $token]) }}">Đặt lại mật khẩu</a>
    <p>
      Nếu bạn không yêu cầu đặt lại mật khẩu, bạn không cần hành động nào với email này và nên xóa bỏ Email.
    </p>
  </body>

</html>
