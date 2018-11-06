<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provinces; 
use App\Districts;
use DB;
use App\worktype;

class adminController extends Controller
{
    //Xóa người dùng
    public function destroyuser($id) {
        User::destroy($id);
    }

    //Thêm tỉnh
    public function addProvince(Request $request) {
        $province = new Provinces();
        $province->province_id = $request->addProvince;
        $province->province_name = $request->addProvince;
        if($province->save()) {
            return response($province, 200);
        };
    }

    //Thêm huyện
    public function addDistrict(Request $request) {
        $district = new Districts();
        $district->province_id = $request->addProvince;
        $district->districts_name = $request->addDistrict;
        if($district->save()) {
            return response($district, 200);
        };
    }

    //Xóa tỉnh
    public function xoatinh($id) {
        $tinh = Provinces::where('id', $id)->first()->province_name;
        DB::table('districts')->where('province_id', $tinh)->delete();
        Provinces::destroy($id);
    }

    //Xóa huyện
    public function xoahuyen($id) {
        Districts::destroy($id);
    }

    //Thêm công việc
    public function addwork(Request $request){
        $work = new worktype();
        $work->work_id = $request->addWork;
        $work->work_type = $request->addWork;
        if ($work->save()){
            return response($work, 200);
        }
    }
    //Xóa công việc
    public function deletework($id){
        worktype::destroy($id);
    }
    //Sửa công việc
    public function editwork($id, Request $request) {
        $work = worktype::find($id);
        $work->work_id = $request->editWork;
        $work->work_type = $request->editWork;
        if ($work->save()){
            return response($work, 200);
        }
    }
}
