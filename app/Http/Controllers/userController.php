<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\worktype;
use App\Provinces;
use App\Districts;
use Crypt;
use Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->user_gender = $request->get('gender');
        $user->user_address = $request->get('address');
        $user->user_district = $request->get('districts_list');
        $user->user_province = $request->get('provinces_list');
        $user->user_phone = $request->get('phone');
        $user->user_birthday = $request->get('birthday');
        $user->save();
        if ($request->hasFile('avatar')){
            $user->user_avatar = 'images/users/'.$user->user_id;
            $user->save();
            $request->file('avatar')->move('images/users', $user->user_id);
        }
        return redirect()->route('user.info', ['id'=>$id])->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // Lấy id
    public function idchangepass($id){
        $userinfo = User::find($id);
        return view('user.changepass', compact(['userinfo']));
    }
    // Đổi mật khẩu
    public function changepass(Request $req, $id){
        $user = User::find($id);
        $pass = Hash::check($req->currentpass, $user->password, []);
        if ($pass == false)
        return back()->with('message', 'Mật khẩu không khớp!');
        else{
            if ($req->newpass != $req->renewpass)
            return back()->with('message', 'Mật khẩu nhập lại không khớp!');
            else{
                $user->password = bcrypt($req->newpass);
                $user->save();
                return back()->with('message', 'Đổi mật khẩu thành công!');
            }
        }
        $decrypt = Crypt::decrypt($user->password);
        dd($decrypt);
    }
    public function info($id){
        $userinfo = User::find($id);
        $work = worktype::all();
        $provinces = Provinces::all();
        $districts = Districts::all();
        return view('user.info', compact(['userinfo', 'work', 'districts', 'provinces']));
    }

}
