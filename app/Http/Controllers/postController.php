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
use App\Mail\sendpost;
use Illuminate\Support\Facades\Mail;
use App\notification;

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
        $mostview = posts::orderBy('views', 'DESC')->take(3)->get();
        $sprovinces = Provinces::all();
        $swork = worktype::all();
        $workdetail = workdetail::all();
        return view('index', compact(['sprovinces', 'posts', 'swork', 'workdetail', 'mostview']));
        // return view('index', ['posts' => $posts],);
    }

    // Guest search
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
        $posts = posts::paginate(15);
        $allposts = posts::all();
        $sprovinces = Provinces::all();
        $mostview = posts::orderBy('views', 'DESC')->take(3)->get();
        $swork = worktype::all();
        foreach ($swork as $item) {
            $count = 0;
            foreach ($allposts as $post){
                if ($post->type == $item->work_type) $count +=1;
            }
            $item->count = $count;
            $item->save();
        }
        $workdetail = workdetail::all();
        foreach ($workdetail as $item) {
            $count = 0;
            foreach ($allposts as $post){
                if ($post->detail == $item->work_more) $count +=1;
            }
            $item->count = $count;
            $item->save();
        }
    	return view('user.allposts', compact(['sprovinces', 'posts', 'swork', 'workdetail', 'mostview']));
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
    public function viewpost($postid){
        $post = posts::where('post_id', 'like', $postid)->first();
        $post->views +=1;
        $post->save();
        $name = User::where('user_id', $post->user_id)->first()->name;
        return view('viewpost', compact(['post', 'name']));
    }
    //Xem bài đăng cho user
    public function userviewpost($postid){
        $post = posts::where('post_id', 'like', $postid)->first();
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
        $worksign = notification::where('work', 'like', $request->type)->get();
        $emails = [];
        $senid = ['id' => $po->post_id];
        foreach ($worksign as $item) {
            array_push($emails, $item->mail);
        }
        // dd($emails);
        Mail::send('emails.users.getnotifications', $senid, function($message) use ($emails)
        {
            $message->to($emails)->subject('Bài đăng mới nhất');
        });
        $po->user_id = $request->user_id;
        $po->type_post = $request->typepost;
        $po->type = $request->type;
        // if ($request->type != "--Chọn--"){
        //     $incre = worktype::where('work_type', 'like', $request->type)->first();
        //     // dd($incre);
        //     $incre->count += 1;
        //     $incre->save();
        // }
        $po->detail = $request->detail;
        // if ($request->detail != "--Chọn--"){
        //     $incre = workdetail::where('work_more', 'like', $request->detail)->first();
        //     $incre->count += 1;
        //     $incre->save();
        // }
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

    // Nhận bài mới
    public function notification($id) {
        $data = user::find($id);
        // dd($data);
        return view('user.notification', compact(['data']));
    }
    public function addnot(Request $req){
        $data = new notification();
        $data->work = $req->addwork;
        $data->mail = User::where('user_id', 'like', $req->adduser)->first()->email;
        $data->user_id = $req->adduser;
        $checks = notification::where('work', 'like', $req->addwork)
        ->where('user_id', 'like', $req->adduser)->count();
        if ($checks != 0)
        return response(200);
        else
        if($data->save()) {
            return response($data, 200);
        };
    }
    public function delnot($id) {
        notification::destroy($id);
    }
}
