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
            <form method="POST" action="{{ action('postController@update', ['id'=>$data->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                {{ method_field('PUT') }}
                <input type="hidden" name="user_id" value="{{ Auth::guard('user')->user()->user_id }}">
                <div class="row row-post">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Chọn loại tin:</label>
                            <select class="form-control" name="typepost" id="typepost">
                                <option selected>--Chọn--</option>
                                <option>Người tìm việc</option>
                                <option>Tìm người giúp việc</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Loại công việc:</label>
                            <select class="form-control" name="type" id="type">
                                <option selected value="--Chọn--">--Chọn--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Chi tiết công việc:</label>
                            <select class="form-control" name="detail" id="detail">
                                <option selected value="--Chọn--">--Chọn--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label for="comment">Tiêu đề:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="form-group">
                            <label for="avatar">
                                <img src="{{ asset($data->image_of_post ) }}" alt="" style="width: 100px; height: 100px;" id="blah" class="img-rounded">
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
                            <textarea class="form-control" rows="10" id="content" name="content">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row row-post">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>Thông tin liên hệ:</legend>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sel1">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $data->address }}">
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
                            <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sel1">Số điện thoại:</label>
                                        <input type="number" name="phone" id="phone" class="form-control" value="{{ $data->phone }}">
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
                                        <input type="text" name="salary" id="salary" class="form-control" value="{{ $data->salary }}">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sel1">Tuổi:</label>
                                        <input type="text" name="age" id="age" class="form-control" value="{{ $data->age }}">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row row-post">
                    <center>
                        <input type="submit" id="dangbai" class="btn btn-primary" value="Sửa bài">
                    </center>
                </div>
            </form>
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
<script>
    $('textarea').val('{{ $data->content }}')
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
    gender = '{{$data->gender}}'
    for (let i = 0; i < 3; i++)
        if (document.getElementById('gender_list').options[i].value == gender)
            document.getElementById("gender_list").selectedIndex = i;

    type_post = '{{$data->type_post}}'
    for (let i = 0; i < 3; i++)
        if (document.getElementById('typepost').options[i].value == type_post)
            document.getElementById('typepost').selectedIndex = i;

    var worktype = $('#type')
    var typework = '{{$data->type}}'
    $.getJSON('/user/typework-data', function(data) {
        $.each(data, function (key, entry) {
            // if (typework == entry.work_type)
            // worktype.append($('<option selected="selected"></option>').attr('value', entry.work_type).text(entry.work_type))
            // else
            worktype.append($('<option></option>').attr('value', entry.work_type).text(entry.work_type))
        })
    })
    var detail = $('#detail')
    worktype.change(function () {
        $('#detail').find('option').remove().end().append('<option value="">--Chọn--</option>')
        let work = $(this).val()
        $.getJSON('/user/detailwork-data', function (data) {
            $.each(data, function (key, entry) {
                if (work == entry.work_id)
                detail.append($('<option></option>').attr('value', entry.work_more).text(entry.work_more))
            })
        })
    })

    var currentprovince = '{{$data->province}}'
    var currentdistrict = '{{$data->district}}'

    var province = $('#provinces_list')
    var district = $('#districts_list')
    $.getJSON('/user/provinces-data', function (data) {
        $.each(data, function (key, entry) {
            if (entry.province_name == currentprovince)
                province.append($('<option></option>').attr('value', entry.province_id).attr('selected',
                    'selected').text(entry.province_name))
            else
                province.append($('<option></option>').attr('value', entry.province_id).text(entry.province_name))
        })
        let cprovince = $('#provinces_list option:selected').val();
        $.getJSON('/user/districts-data', function (data) {
            $.each(data, function (key, entry) {
                if (cprovince == entry.province_id) {
                    if (entry.districts_name == currentdistrict)
                        district.append($('<option></option>').attr('value', entry.districts_name)
                            .attr('selected', 'selected').text(entry.districts_name))
                    else
                        district.append($('<option></option>').attr('value', entry.districts_name)
                            .text(entry.districts_name))
                }
            })
        })
    })
    $('#provinces_list').change(function () {
        console.log($(this).val())
        $('#districts_list').find('option').remove().end().append('<option value="">--Chọn--</option>');
        let province = $(this).val();
        $.getJSON('/user/districts-data', function (data) {
            $.each(data, function (key, entry) {
                if (province == entry.province_id) {
                    district.append($('<option></option>').attr('value', entry.districts_name).text(
                        entry.districts_name))
                    console.log(province + ' ' + entry.province_id + ' ' + entry.districts_name)
                }
            })
        })
    })


</script>
@endsection
