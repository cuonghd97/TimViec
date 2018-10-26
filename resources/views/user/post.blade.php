@extends('user.baseuser')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
@section('rightPage')
<div class="col-md-7 col-sm-7">
    <div class="rows right-side">

        <div class="panel panel-default">
            <div class="panel-heading ads-hdr">
                <i class="fa fa-info-circle fa-fw"></i> Đăng bài
            </div>

            <form>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Chọn loại tin:</label>
                            <select class="form-control">
                                <option selected>--Chọn--</option>
                                <option>Người tìm việc</option>
                                <option>Tìm người giúp việc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sel1">Loại công việc:</label>
                            <select class="form-control">
                                <option selected>--Chọn--</option>
                                <option>Giúp việc theo giờ</option>
                                <option>Giúp việc fulltime</option>
                                <option>Giúp việc ...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="comment">Nội dung:</label>
                            <textarea class="form-control" rows="10" id="comment"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>Địa chỉ</legend>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sel1">Địa chỉ</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="sel1">Quận, Huyện:</label>
                                    <select class="form-control" id="districts-list">
                                        <option selected>--Chọn--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="sel1">Tỉnh Thành Phố:</label>
                                    <select class="form-control" id="provinces-list">
                                        <option selected>--Chọn--</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>Thông tin thêm:</legend>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sel1">Giới tính</label>
                                        <select class="form-control" id="gender-list">
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
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/main.js') }}"></script>
@endsection