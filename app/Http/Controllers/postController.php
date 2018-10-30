<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\posts;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DB;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = posts::paginate(18);
    	return view('index', ['posts' => $posts]);
    }

    public function userpost()
    {
        $posts = posts::all();
        return view('user.index', ['posts' => $posts]);
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
        posts::destroy($id);
    }

    public function viewpost($id){
        $post = posts::find($id);
        $name = User::where('user_id', $post->user_id)->first()->name;
        return view('viewpost', compact(['post', 'name']));
    }

    //Thêm bài đăng mới
    public function addPost(Request $request){
        $po = new posts();
        $po->post_id = uniqid();
        $po->user_id = $request->user_id;
        $po->type_post = $request->typepost;
        $po->type = $request->type;
        $po->title = $request->title;
        $po->content = $request->content;
        $po->address = $request->address;
        $po->district = $request->districts_list;
        $po->province = $request->provinces_list;
        $po->age = $request->age;
        $po->salary = $request->salary;
        $po->gender = $request->gender_list;
        $po->save();
        if ($request->hasFile('avatar')){
            $po->image = 'images/posts/'.$po->post_id;
                $po->save();
            $request->file('avatar')->move('images/posts', $po->post_id);
        }
        return redirect()->route('dangtin');
    }

    //Thông tin các bài đăng dưới dạng json
    public function postdata() {
        $userid = Auth::guard('user')->user()->user_id;
        $data = posts::where('user_id', $userid)->get();
        return response()->json($data);
    }
}
