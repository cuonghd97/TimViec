@extends('user.baseuser')
@section('rightPage')
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default">
            <div class="panel-heading ads-hdr"><i class="fa fa-info-circle fa-fw"></i> Thông tin tài khoản</div>
            <div class="tai-khoan">

                <form name="frmProfile" action="{{ action('userController@update', ['id'=>$userinfo->id]) }}"
                    method="post" enctype="multipart/form-data" onsubmit="return validate_form()">
                    {{ csrf_field() }}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="rows">
                        <div class="col-xs-5"><i class="fa fa-user-circle-o fa-fw"></i> Tên liên hệ</div>
                        <div class="col-xs-7">
                            <input type="text" name="name" value="{{ $userinfo->name }}" size="30"
                                maxlength="30" class="form-control">
                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-xs-5"><i class="fa fa-transgender-alt"></i> Giới tính</div>
                        <div class="col-xs-3">
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
                        <div class="col-xs-5"><i class="fa fa-transgender-alt"></i> Ngày sinh</div>
                        <div class="col-xs-4">
                            <input id="datepicker" name="birthday" width="276" value="{{ $userinfo->user_birthday }}" />
                        </div>
                    </div>
                    <div class="rows">
                        <div class="col-xs-5"><i class="fa fa-envelope-o fa-fw"></i> Email </div>
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
                        <div class="col-xs-5"><i class="fa fa-location-arrow fa-fw"></i> Địa chỉ </div>
                        <div class="col-xs-3">
                            <input type="text" name="district" value="{{ $userinfo->user_district }}" size="30"
                                maxlength="30" class="form-control">
                            <small id="provincehelp" class="form-text text-muted">Quận, Huyện.</small>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <select id="province" name="province" class="form-control">
                                    <option>Hà Nội</option>
                                    <option>Hồ Chí Minh</option>
                                    <option>Hải Phòng</option>
                                    <option>Đà Nẵng</option>
                                    <option>Hà Giang</option>
                                    <option>Cao Bằng</option>
                                    <option>Lai Châu</option>
                                    <option>Lào Cai</option>
                                    <option>Tuyên Quang</option>
                                    <option>Lạng Sơn</option>
                                    <option>Bắc Kạn</option>
                                    <option>Thái Nguyên</option>
                                    <option>Yên Bái</option>
                                    <option>Sơn La</option>
                                    <option>Phú Thọ</option>
                                    <option>Vĩnh Phúc</option>
                                    <option>Quảng Ninh</option>
                                    <option>Bắc Giang</option>
                                    <option>Bắc Ninh</option>
                                    <option>Hải Dương</option>
                                    <option>Hưng Yên</option>
                                    <option>Hòa Bình</option>
                                    <option>Hà Nam</option>
                                    <option>Nam Định</option>
                                    <option>Thái Bình</option>
                                    <option>Ninh Bình</option>
                                    <option>Thanh Hóa</option>
                                    <option>Nghệ An</option>
                                    <option>Hà Tĩnh</option>
                                    <option>Quảng Bình</option>
                                    <option>Quảng Trị</option>
                                    <option>Thừa Thiên - Huế</option>
                                    <option>Quảng Nam</option>
                                    <option>Quảng Ngãi</option>
                                    <option>Kon Tum</option>
                                    <option>Bình Định</option>
                                    <option>Gia Lai</option>
                                    <option>Phú Yên</option>
                                    <option>Đắk Lắk</option>
                                    <option>Khánh Hòa</option>
                                    <option>Lâm Đồng</option>
                                    <option>Bình Phước</option>
                                    <option>Bình Dương</option>
                                    <option>Ninh Thuận</option>
                                    <option>Tây Ninh</option>
                                    <option>Bình Thuận</option>
                                    <option>Đồng Nai</option>
                                    <option>Long An</option>
                                    <option>Đồng Tháp</option>
                                    <option>An Giang</option>
                                    <option>Bà Rịa - Vũng Tàu</option>
                                    <option>Tiền Giang</option>
                                    <option>Kiên Giang</option>
                                    <option>Cần Thơ</option>
                                    <option>Bến Tre</option>
                                    <option>Vĩnh Long</option>
                                    <option>Trà Vinh</option>
                                    <option>Sóc Trăng</option>
                                    <option>Bạc Liêu</option>
                                    <option>Cà Mau</option>
                                    <option>Điện Biên</option>
                                    <option>Đắk Nông</option>
                                    <option>Hậu Giang</option>
                                </select>
                                <small id="provincehelp" class="form-text text-muted">Tỉnh.</small>
                            </div>
                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-xs-5"><i class="fa fa-phone fa-fw"></i> Điện thoại</div>
                        <div class="col-xs-7">
                            <input type="text" name="phone" value="{{ $userinfo->user_phone }}" size="20"
                                maxlength="20" class="form-control">
                        </div>
                    </div>
                    <!--<div class="rows">
                                  <div class="col-xs-5"><i class="fa fa-check-circle fa-fw"></i> SMS</div>
                                  <div class="col-xs-7">
                                      <p class="badge">&nbsp;</p>
                                  </div>
                                  </div>-->
                    <div class="rows">
                        <div class="col-xs-5"><i class="fa fa-picture-o fa-fw"></i> Avatar</div>
                        <div class="col-xs-7">
                            <img src="{{ asset( $userinfo->user_avatar ) }}" alt="" style="width: 50px; height: 50px;"
                                id="blah">
                        </div>
                    </div>
                    <div class="rows">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <input type="file" name="avatar" class="container" onchange="readURL(this);">
                        </div>
                    </div>


                    <div class="rows">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-9">&nbsp;
                            <button type="submit" name="profilesm" value="Thay đổi" class="btn btn-default btn-success">Cập
                                nhật</button>
                            <br><br>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <form id="sendreq" name="sendreq" action="/ajax-avatar.php?ua=" method="post">
                <input type="hidden" name="pg_no" value="1">
                <input type="hidden" id="sendreq_mya" name="mya" value="0">
            </form>

            <div class="clearfix"></div>


        </div>

        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Bạn có muốn xóa bản tin này?
                    </div>
                    <div class="modal-body" id="modalText">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="send-resp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-inline">Thông báo!</div>
                    </div>
                    <div class="modal-body" id="modalTextResp">
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger btn-ok" data-dismiss="modal">Ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    gender = '{{$userinfo->user_gender}}'
    for (let i = 0; i < 3; i++)
        if (document.getElementById('gender').options[i].value == gender)
            document.getElementById("gender").selectedIndex = i;

    province = '{{$userinfo->user_province}}'
    for (let i = 0; i < 63; i++)
        if (document.getElementById('province').options[i].value == province)
            document.getElementById("province").selectedIndex = i;

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
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