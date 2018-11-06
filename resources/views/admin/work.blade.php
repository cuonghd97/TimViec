@extends('admin.home')
@section('rightContent')
<link rel="stylesheet" href="{{ secure_asset('adminstyle/DataTables-1.10.18/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ secure_asset('adminstyle/DataTables-1.10.18/css/jquery.dataTables.css') }}">
<div class="page-wrapper">
    <link href="{{ secure_asset('adminstyle/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
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
            {{ csrf_field() }}
            <div class="form-group col-sm-5">
                <input type="text" name="addwork" class="form-control" id="addwork" placeholder="Thêm loại công việc...">
            </div>
            <div class="col-sm-3 form-group">
                <button type="button" class="btn btn-primary" id="btaddwork">Thêm</button>
            </div>
        </div>
        <div class="row">
            <table id="work" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên công việc</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
<script src="{{ secure_asset('adminstyle/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ secure_asset('adminstyle/DataTables-1.10.18/js/jquery.dataTables.js') }}"></script>
<script src="{{ secure_asset('adminstyle/DataTables-1.10.18/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ secure_asset('adminstyle/js/work.js') }}"></script>
@endsection