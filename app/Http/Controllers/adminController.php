<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provinces; 
use App\Districts;
use DB;
use App\worktype;
use App\posts;

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

    //Thêm công việc ajax
    public function addwork(Request $request){
        $work = new worktype();
        $work->work_id = $request->addWork;
        $work->work_type = $request->addWork;
        $work->image = 'images/works/'.$request->addWork;
        $request->file($request->addImage)->move('images/works', $request->addWork);
        if ($work->save()){
            return response($work, 200);
        }
    }

    // Thêm công việc không ajax
    public function addw(Request $request)
    {
        $work = new worktype();
        $work->work_id = $request->addwork;
        $work->work_type = $request->addwork;
        $work->image = 'images/works/'.$request->addwork;
        $work->save();
        $request->file('addimage')->move('images/works', $request->addwork);
        return back();
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

    //Sửa công việc không ajax
    public function editw(Request $request, $id)
    {
        $work = worktype::find($id);
        $work->work_id = $request->addwork;
        $work->work_type = $request->addwork;
        $work->image = 'images/works/'.$request->addwork;
        $work->save();
        $request->file('addimage')->move('images/works', $request->addwork);
        return back();
    }

    // Hiện công việc
    public function showwork() {
        $datawork = worktype::all();
        return view('admin.work', compact(['datawork']));
    }
    // Xóa việc 
    public function deletew($id){
        worktype::destroy($id);
        return back();
    }
    //Xóa bài đăng
    public function deletepost($id) {
        posts::destroy($id);
    }


}
