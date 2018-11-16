<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\worktype;
use App\posts;
use App\User;
use App\Provinces;
use App\workdetail;
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
    //index của guest
    public function index()
    {
        //
        $posts = posts::paginate(15);
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();

        return view('index', compact(['sprovinces', 'posts', 'swork', 'workdetail']));
        // return view('index', ['posts' => $posts],);
    }

    public function search(Request $request)
    {
        // dd($request->search_loca);
        // dd($request->search_kat);
        $posts = posts::paginate(15);
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();

        if ($request->search_loca == 'Toàn quốc...' && $request->search_kat == 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')->paginate(15);
        else
        if ($request->search_loca != 'Toàn quốc...' && $request->search_kat == 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')
        ->where('province', 'like', $request->search_loca)
        ->paginate(15);
        else
        if ($request->search_loca == 'Toàn quốc...' && $request->search_kat != 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')
        ->where('type', 'like', $request->search_kat)
        ->paginate(15);
        else
        if ($request->search_loca != 'Toàn quốc...' && $request->search_kat != 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')
        ->where('type', 'like', $request->search_kat)
        ->where('province', 'like', $request->search_loca)
        ->paginate(15);

        if ($request->searchdata == null && $request->search_loca == 'Toàn quốc...' && $request->search_kat == 'Chọn...')
        return redirect()->action('postController@index');
        else
        return view('search', compact(['sprovinces', 'posts', 'swork', 'workdetail']));
    }

    // Trả về tỉnh về trang index của guest
    public function provincesguest()
    {

    }

    // Chức năng search dùng cho khi đã đăng nhập
    public function usersearch(Request $request)
    {
        $posts = posts::paginate(15);
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();

        if ($request->search_loca == 'Toàn quốc...' && $request->search_kat == 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')->paginate(15);
        else
        if ($request->search_loca != 'Toàn quốc...' && $request->search_kat == 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')
        ->where('province', 'like', $request->search_loca)
        ->paginate(15);
        else
        if ($request->search_loca == 'Toàn quốc...' && $request->search_kat != 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')
        ->where('type', 'like', $request->search_kat)
        ->paginate(15);
        else
        if ($request->search_loca != 'Toàn quốc...' && $request->search_kat != 'Chọn...')
        $posts = posts::where('title', 'like', '%'.$request->searchdata.'%')
        ->where('type', 'like', $request->search_kat)
        ->where('province', 'like', $request->search_loca)
        ->paginate(15);

        if ($request->searchdata == null && $request->search_loca == 'Toàn quốc...' && $request->search_kat == 'Chọn...')
        return redirect()->action('postController@userpost');
        else
        return view('user.search', compact(['sprovinces', 'posts', 'swork', 'workdetail']));
    }
    // Lọc theo loại công viêc
    public function bywork($work){
        $posts = posts::where('type', 'like', $work)->paginate(15);
        if ($posts->count() == 0)
        $posts = posts::where('detail', 'like', $work)->paginate(15);
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();
        return view('bywork', compact(['sprovinces', 'posts', 'swork', 'workdetail']));
    }
    public function userpost()
    {
        $posts = posts::paginate(18);
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();
    	return view('user.allposts', compact(['sprovinces', 'posts', 'swork', 'workdetail']));
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
        $data = posts::find($id);
        $countTypeWork = worktype::count();
        return view('user.editpost', compact(['data', 'countTypeWork']));
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
        $po = posts::find($id);
        $po->user_id = $request->user_id;
        $po->type_post = $request->typepost;
        $po->type = $request->type;
        $po->detail = $request->detail;
        $po->title = $request->title;
        $po->content = $request->content;
        $po->address = $request->address;
        $po->phone = $request->phone;
        $po->district = $request->districts_list;
        $po->province = $request->provinces_list;
        $po->age = $request->age;
        $po->salary = $request->salary;
        $po->gender = $request->gender_list;
        // $work = worktype::where('work_type', 'like', $request->type)->first();
        // if ($request->type == '--Chọn--')
        // $po->image = 'null';
        // else
        // $po->image = $work->image;
        if ($request->hasFile('avatar')){
            $po->image_of_post = 'images/posts/'.$po->post_id;
            $po->image = 'images/posts/'.$po->post_id;
            $po->save();
            $request->file('avatar')->move('images/posts', $po->post_id);
        }
        if ($request->type == '--Chọn--')
        return back()->with('message', 'Chưa chọn loại công việc');
        else{
            $po->save();
            return redirect()->route('user.myposts')->with('message', 'Sửa bài thành công');
        }

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

    //Xem bài đăng cho guest
    public function viewpost($id){
        $post = posts::find($id);
        $post->views +=1;
        $post->save();
        $name = User::where('user_id', $post->user_id)->first()->name;
        return view('viewpost', compact(['post', 'name']));
    }
    //Xem bài đăng cho user
    public function userviewpost($id){
        $post = posts::find($id);
        $post->views +=1;
        $post->save();
        $name = User::where('user_id', $post->user_id)->first()->name;
        return view('user.viewpost', compact(['post', 'name']));
    }

    // Lọc theo loại công viêc cho user
    public function byworkuser($work){
        $posts = posts::where('type', 'like', $work)->paginate(15);
        if ($posts->count() == 0)
        $posts = posts::where('detail', 'like', $work)->paginate(15);
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();
        return view('user.bywork', compact(['sprovinces', 'posts', 'swork', 'workdetail']));
    }

    //Thêm bài đăng mới
    public function addPost(Request $request){
        $po = new posts();
        $po->post_id = uniqid();
        $po->user_id = $request->user_id;
        $po->type_post = $request->typepost;
        $po->type = $request->type;
        $po->detail = $request->detail;
        $po->title = $request->title;
        $po->content = $request->content;
        $po->address = $request->address;
        $po->phone = $request->phone;
        $po->district = $request->districts_list;
        $po->province = $request->provinces_list;
        $po->age = $request->age;
        $po->salary = $request->salary;
        $po->gender = $request->gender_list;
        // $work = worktype::where('work_type', 'like', $request->type)->first();
        // $po->image = $work->image;
        $po->save();
        if ($request->hasFile('avatar')){
            $po->image_of_post = 'images/posts/'.$po->post_id;
            $po->image = 'images/posts/'.$po->post_id;
            $po->save();
            $request->file('avatar')->move('images/posts', $po->post_id);
        }
        return redirect()->route('dangtin')->with('message', 'Đăng bài thành công');
    }

    //Thông tin các bài đăng dưới dạng json
    public function postdata() {
        $userid = Auth::guard('user')->user()->user_id;
        $data = posts::where('user_id', $userid)->get();
        return response()->json($data);
    }
}
