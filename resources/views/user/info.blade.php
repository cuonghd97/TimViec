@extends('user.baseuser')
@section('rightPage')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default">
            <div class="panel-heading ads-hdr"><i class="fa fa-info-circle fa-fw"></i> Thông tin tài khoản</div>
            <div class="tai-khoan">

                <form name="frmProfile" action="{{ action('userController@update', ['id'=>$userinfo->id]) }}" method="post"
                    enctype="multipart/form-data" onsubmit="return validate_form()">
                    {{ csrf_field() }}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="rows">
                        <div class="col-xs-3"><i class="fa fa-user-circle-o fa-fw"></i> Tên liên hệ</div>
                        <div class="col-xs-7">
                            <input type="text" name="name" value="{{ $userinfo->name }}" size="30" maxlength="30" class="form-control">
                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-xs-3"><i class="fa fa-transgender-alt"></i> Giới tính</div>
                        <div class="col-xs-3 fixtop">
                            <div class="form-group">
                                <select class="form-control" name="gender" id="gender">
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="col-xs-3"><i class="fa fa-transgender-alt"></i> Ngày sinh</div>
                        <div class="col-xs-4">
                            <input id="datepicker" name="birthday" width="276" value="{{ $userinfo->user_birthday }}" />
                        </div>
                    </div>
                    <div class="rows">
                        <div class="col-xs-3"><i class="fa fa-envelope-o fa-fw"></i> Email </div>
                        <div class="col-xs-7">
                            <p class="form-control-static border-box">&nbsp;{{ $userinfo->email }}</p>
                        </div>

                    </div>
                    <!--//
                              <div class="rows clearfix" style="background-color: #f7f7f7">
                                  <div class="col-md-3 col-xs-4"><i class="fa fa-user-circle-o fa-fw"></i> Kiểu tài khoản</div>
                                  <div class="col-md-9 col-xs-8">
                                      <div style="padding: 2px">0 0</div>
                                  </div>
                              </div>
                              //-->

                    <div class="rows">
                        <div class="col-xs-3"><i class="fa fa-location-arrow fa-fw"></i> Địa chỉ </div>
                        <div class="col-xs-9 address_info">
                            <div class="col-xs-12">
                                <input type="text" name="address" id="address" class="form-control" value="{{ $userinfo->user_address }}">
                                <small id="provincehelp" class="form-text text-muted">Số nhà/Thôn/Xã</small>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <select id="districts_list" name="districts_list" class="form-control">
                                        <option selected>--Chọn--</option>
                                    </select>
                                    <small id="provincehelp" class="form-text text-muted">Quận huyện.</small>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <select id="provinces_list" name="provinces_list" class="form-control">
                                        <option selected>--Chọn--</option>
                                    </select>
                                    <small id="provincehelp" class="form-text text-muted">Tỉnh.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-xs-3"><i class="fa fa-phone fa-fw"></i> Điện thoại</div>
                        <div class="col-xs-7">
                            <input type="text" name="phone" value="{{ $userinfo->user_phone }}" size="20" maxlength="20"
                                class="form-control">
                        </div>
                    </div>
                    <!--<div class="rows">
                                  <div class="col-xs-3"><i class="fa fa-check-circle fa-fw"></i> SMS</div>
                                  <div class="col-xs-7">
                                      <p class="badge">&nbsp;</p>
                                  </div>
                                  </div>-->
                    <div class="rows fixtop">
                        <div class="col-xs-3"><i class="fa fa-picture-o fa-fw"></i> Avatar</div>
                        <center>
                            <div class="col-xs-7 fixtop">
                                <img src="{{ asset( $userinfo->user_avatar ) }}" alt="" style="width: 100px; height: 100px;"
                                    id="blah">
                            </div>
                        </center>
                    </div>
                    <div class="rows fixtop">
                        <div class="col-xs-5"></div>

                        <div class="col-xs-7">
                            <center>
                                <input type="file" name="avatar" class="container" onchange="readURL(this);">
                            </center>
                        </div>
                    </div>


                    <div class="rows">
                        <center>
                            <div class="col-md-12 fixtop">&nbsp;
                                <button type="submit" name="profilesm" value="Thay đổi" class="btn btn-default btn-success">Cập
                                    nhật</button>
                                <br><br>
                            </div>
                        </center>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <form id="sendreq" name="sendreq" action="/ajax-avatar.php?ua=" method="post">
                <input type="hidden" name="pg_no" value="1">
                <input type="hidden" id="sendreq_mya" name="mya" value="0">
            </form>
            <input type="hidden" name="provincescount" id="provincescount" value="{{ $provinces->count() }}">
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
    gender = '{{$userinfo->user_gender}}'
    for (let i = 0; i < 3; i++)
        if (document.getElementById('gender').options[i].value == gender)
            document.getElementById("gender").selectedIndex = i;

    var currentprovince = '{{$userinfo->user_province}}'
    var currentdistrict = '{{$userinfo->user_district}}'

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
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap'
    });

    $('form').find('.rows').css('margin-top', '5px');
</script>
@endsection