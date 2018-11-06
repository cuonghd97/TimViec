@extends('admin.home')
@section('rightContent')
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/jquery.dataTables.css') }}">
<div class="page-wrapper">
    <link href="{{ asset('adminstyle/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý bài đăng</h3>
        </div>

    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container">
        <!-- Start Page Content -->
        <table id="posts">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post ID</th>
                    <th>Tiêu đề </th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
        <!-- End PAge Content -->
    </div>
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết bài đăng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Chi tiết</th>
                                <th scope="col">Nội dung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="id">Otto</td>
                            </tr>
                            <tr>
                                <td>Loại bài đăng</td>
                                <td id="typepost">Thornton</td>
                            </tr>
                            <tr>
                                <td>ID Người đăng</td>
                                <td id="iduser">Thornton</td>
                            </tr>
                            <tr>
                                <td>Tiêu đề</td>
                                <td id="title">the Bird</td>
                            </tr>
                            <tr>
                                <td>Nội dung</td>
                                <td id="content">the Bird</td>
                            </tr>
                            <tr>
                                <td>Tuổi</td>
                                <td id="age">the Bird</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td id="phone">the Bird</td>
                            </tr>
                            <tr>
                                <td>Loại công việc</td>
                                <td id="work">the Bird</td>
                            </tr>
                            <tr>
                                <td>Lương</td>
                                <td id="salary">the Bird</td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td id="gender">the Bird</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td id="address">the Bird</td>
                            </tr>
                            <tr>
                                <td>Đăng ngày</td>
                                <td id="postat">the Bird</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer">Trang quản trị</footer>
    <!-- End footer -->
</div>
<script src="{{ asset('adminstyle/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('adminstyle/DataTables-1.10.18/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminstyle/DataTables-1.10.18/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('adminstyle/js/posts.js') }}"></script>
@endsection