<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provinces; 
use App\Districts;

class adminController extends Controller
{
    //
    public function destroyuser($id) {
        User::destroy($id);
    }

    public function addProvince(Request $request) {
        $province = new Provinces();
        $province->province_id = $request->addProvince;
        $province->province_name = $request->addProvince;
        if($province->save()) {
            return response($province, 200);
        };
    }

    public function addDistrict(Request $request) {
        $district = new Districts();
        $district->province_id = $request->addProvince;
        $district->districts_name = $request->addDistrict;
        if($district->save()) {
            return response($district, 200);
        };
    }
}
