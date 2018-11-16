@extends('admin.home')
@section('rightContent')
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/jquery.dataTables.css') }}">
<div class="page-wrapper">
    <link href="{{ asset('adminstyle/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý công việc</h3>
        </div>

    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container">
        <!-- Start Page Content -->
        <div class="row">
            <form id="form_upload" enctype="multipart/form-data" style="width: 100%" method="POST" action="{{ action('adminController@addw') }}">
                {{ csrf_field() }}
                <div class="form-group col-sm-4">
                    <input type="text" name="addwork" class="form-control" id="addwork" placeholder="Thêm loại công việc...">
                </div>
                <div class="form-group col-sm-4" style="margin-left: 15px">
                    <input type="file" name="addimage" class="form-control custom-file-input" id="addimage">
                    <label for="addimage" class="custom-file-label">Thêm ảnh mô tả: </label>
                </div>
                <div class="col-sm-3 form-group">
                    {{-- <button type="button" class="btn btn-primary" id="btaddwork">Thêm</button> --}}
                    <input type="submit" class="btn btn-primary" value="Thêm">
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table id="work" class="table" style="background: white;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên công việc</th>
                            <th>Ảnh</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datawork as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->work_type }}</td>
                            <td><img src="{{ asset($item->image) }}" alt="" style="width:200px; height: auto;"></td>
                            <td>
                                <a href="{{ route('xoaviec', ['id' => $item->id]) }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="listwork">Chọn loại việc</label>
                            <select name="listwork" id="listwork" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="more">Chi tiết công việc:</label>
                            {{ csrf_field() }}
                            <input type="text" name="more" id="more" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="btnaddmore">Thêm</button>
                        </div>
                    </div>
                    <table class="table" style="background: white;">
                        <thead>
                            <tr>
                                <th>Công việc</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="workbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa loại công việc</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="editwork"></label>
                        <input type="text" class="form-control" name="editwork" id="editwork">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnedit">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer">Trang quản trị</footer>
    <!-- End footer -->
</div>
<script src="{{ asset('adminstyle/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('adminstyle/DataTables-1.10.18/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminstyle/DataTables-1.10.18/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('adminstyle/js/work.js') }}"></script>
@endsection
