<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provinces;
use App\Districts;
use DB;
use App\worktype;
use App\posts;
use App\workdetail;

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
    // Thêm workdetail
    public function addworkdetail(Request $req){
        $work = new workdetail();
        $work->work_id = $req->addBigWork;
        $work->work_more = $req->addWork;
        if ($work->save()){
            return response($work, 200);
        }
    }

   // Xóa workdetail
    public function deleteworkdetail($id){
        workdetail::destroy($id);
    }

    // Hiện công việc
    public function showwork() {
        $datawork = worktype::all();
        return view('admin.work', compact(['datawork']));
    }
    // Xóa việc
    public function deletew($id){
        $work = worktype::find($id)->work_type;
        DB::table('workdetails')->where('work_id', $work)->delete();
        worktype::destroy($id);
        return back();
    }
    //Xóa bài đăng
    public function deletepost($id) {
        posts::destroy($id);
    }
}
