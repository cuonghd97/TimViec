@extends('user.baseuser')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@section('rightPage')
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default">
            <div class="panel-heading ads-hdr">
                <i class="fa fa-info-circle fa-fw"></i> Đăng bài
            </div>

            <form method="POST" action="{{ action('postController@addPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ Auth::guard('user')->user()->user_id }}">
                <input type="hidden" name="fulladdress" id="fulladdress">
                <div class="row row-post">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Chọn loại tin:</label>
                            <select class="form-control" name="typepost">
                                <option selected>--Chọn--</option>
                                <option>Người tìm việc</option>
                                <option>Tìm người giúp việc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Loại công việc:</label>
                            <select class="form-control" name="type" id="type">
                                <option selected>--Chọn--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label for="comment">Tiêu đề:</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="form-group">
                            <label for="avatar">
                                <img src="" alt="" style="width: 100px; height: 100px;" id="blah" class="img-rounded">
                            </label>
                            <span>Chọn ảnh</span>
                            <input type="file" name="avatar" onchange="readURL(this);" id="avatar">
                        </div>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="comment">Nội dung:</label>
                            <textarea class="form-control" rows="10" id="content" name="content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>Địa chỉ</legend>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sel1">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="sel1">Quận, Huyện:</label>
                                    <select class="form-control" id="districts_list" name="districts_list">
                                        <option selected>--Chọn--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="sel1">Tỉnh Thành Phố:</label>
                                    <select class="form-control" id="provinces_list" name="provinces_list">
                                        <option selected>--Chọn--</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>Thông tin thêm:</legend>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sel1">Giới tính</label>
                                        <select class="form-control" id="gender_list" name="gender_list">
                                            <option selected>--Chọn--</option>
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sel1">Mức lương:</label>
                                        <input type="text" name="salary" id="salary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sel1">Tuổi:</label>
                                        <input type="text" name="age" id="age" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row row-post">
                    <center>
                        <input type="submit" id="dangbai" class="btn btn-primary" value="Đăng bài">
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#btn_avatar').on('click', function () {
        $('#avatar').trigger('click');
    });
</script>
@endsection