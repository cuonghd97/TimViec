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
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <table id="provinceslist" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Tỉnh</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1>Right</h1>
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
<script src="{{ asset('adminstyle/js/address.js') }}"></script>
@endsection