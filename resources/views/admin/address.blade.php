@extends('admin.home')
@section('rightContent')
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('adminstyle/DataTables-1.10.18/css/jquery.dataTables.css') }}">

<div class="page-wrapper">
    <link href="{{ asset('adminstyle/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý địa chỉ</h3>
        </div>

    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-5">
                        <input type="text" name="addprovince" class="form-control" id="addprovince" placeholder="Thêm tỉnh...">
                    </div>
                    <div class="col-sm-3 form-group">
                        <button type="button" class="btn btn-primary" id="btaddprovince">Thêm</button>
                    </div>
                </div>
                <div class="row">
                    <table id="provinceslist" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tỉnh</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <select name="changeprovince" id="changeprovince" class="col-sm-5 custom-select" style="margin-bottom: 10px;">
                        <option selected>--Chọn--</option>
                    </select>
                    <div class="form-group col-sm-5">
                        <input type="text" class="form-control" id="adddistrict" placeholder="Thêm huyện..." name="adddistrict">
                    </div>
                    <div class="col-sm-2 form-group">
                        <button type="button" class="btn btn-primary" id="btadddistrict">Thêm</button>
                    </div>
                </div>
                <div class="row">
                    <table id="districtlists" class="table">
                        <thead>
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Huyện</td>
                                <td scope="col">Chỉnh sửa</td>
                            </tr>
                        </thead>
                        <tbody id="districts_body">
                        </tbody>
                    </table>
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
<script src="{{ asset('adminstyle/js/address.js') }}"></script>
@endsection