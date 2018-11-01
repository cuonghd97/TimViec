@extends('admin.home')
@section('rightContent')
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/jquery.dataTables.css') }}">
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý người dùng</h3>
        </div>

    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <table id="usersdata" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
        <div class="modal fade" id="infouser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">ID:</div>
                            <div class="col-sm-8" id="id"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Tên:</div>
                            <div class="col-sm-8" id="name"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Email:</div>
                            <div class="col-sm-8" id="email"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Giới tính:</div>
                            <div class="col-sm-8" id="gender"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Địa chỉ:</div>
                            <div class="col-sm-8" id="address"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Ngày sinh:</div>
                            <div class="col-sm-8" id="birthday"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Số điện thoại:</div>
                            <div class="col-sm-8" id="phone"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Avatar</div>
                            <div class="col-sm-8">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">ID:</div>
                            <div class="col-sm-8" id="id"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Tên:</div>
                            <div class="col-sm-8" id="name"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Email:</div>
                            <div class="col-sm-8" id="email"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Giới tính:</div>
                            <div class="col-sm-8" id="gender"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Địa chỉ:</div>
                            <div class="col-sm-8" id="address"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Ngày sinh:</div>
                            <div class="col-sm-8" id="birthday"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Số điện thoại:</div>
                            <div class="col-sm-8" id="phone"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Avatar</div>
                            <div class="col-sm-8">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<script src="{{ asset('adminstyle/js/manageruser.js') }}"></script>
@endsection