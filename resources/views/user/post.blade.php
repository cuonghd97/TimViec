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
            </form>
        </div>
    </div>
</div>
@endsection