<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'postController@index');

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'UserAuth\LoginController@login');
    Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'UserAuth\RegisterController@register');

    Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');

    // Route::get('/info/{id}', function($id){
    //   return view('user.info');
    // })->name('user.info');
    Route::get('/info/{id}', 'userController@info')->name('user.info');
    Route::post('/update/{id}', 'userController@update');
    Route::get('/index', 'postController@index');

    Route::get('dang-tin', function() {
        return view('user.post');
    })->name('dangtin');
    Route::post('addpost', 'postController@addPost');
    
    Route::get('provinces-data', function(){
        $data = App\Provinces::all('province_id', 'province_name');
        return response()->json($data);
    });

    Route::get('districts-data', function(){
        $data = App\Districts::all('province_id', 'districts_name');
        return response()->json($data);
    });

    Route::get('typework-data', function() {
        $data = App\worktype::all('work_id', 'work_type');
        return response()->json($data);
    }); 

    Route::get('/index', 'postController@userpost')->name('user.index');

    Route::get('myposts', function() {
        return view('user.myposts');
    })->name('user.myposts');

    Route::get('posts-data', 'postController@postData');

    Route::get('/deletepost/{id}', 'postController@destroy');

    Route::get('/editpost/{id}', 'postController@edit');

    Route::post('/updatepost/{id}', 'postController@update');
    Route::get('/viewpost/{id}', 'postController@userviewpost')->name('user.viewpost');

    //Tất cả các bài đăng
    Route::get('/allposts', 'postController@userpost')->name('user.allposts');
});
Route::get('/viewpost/{id}', 'postController@viewpost')->name('viewpost');
Route::get('search/title', function() {
  $data = App\posts::all('title');
  return response()->json($data);
});

Route::resource('posts', 'postController');
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

//   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
//   Route::post('/register', 'AdminAuth\RegisterController@register');

//   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
//   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
//   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
//   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('manager-users', function() {
    return view('admin.managerusers');
  })->name('admin.managerusers');

  Route::get('manager-works', function() {
    return view('admin.work');
  })->name('admin.work');

  Route::get('users-data', function() {
    $data = App\User::all();
        return response()->json($data);
  });

  Route::get('provinces', function() {
    $data = App\Provinces::all();
        return response()->json($data);
  });

  Route::get('districts', function() {
    $data = App\Districts::all();
        return response()->json($data);
  });

  Route::get('work', function() {
    $data = App\worktype::all();
    return response()->json($data);
  });

  Route::get('admin/deleterow/{id}', 'adminController@destroyuser');

  Route::get('address', function() {
    return view('admin.address');
  })->name('admin.address');
  // Thêm, xóa tỉnh
  Route::post('addprovince', 'adminController@addProvince');
  Route::get('/deleteprovince/{id}', 'adminController@xoatinh');
  // Thêm, xóa huyện
  Route::post('adddistrict', 'adminController@addDistrict');
  Route::get('/deletedistrict/{id}', 'adminController@xoahuyen');

  //Thêm, Sửa, xóa loại công việc
  Route::post('addwork', 'adminController@addwork');
  Route::get('deletework/{id}', 'adminController@deletework');
  Route::post('editwork/{id}', 'adminController@editwork');

  //Sửa, xóa bài đăng
  Route::get('posts', function() {
    return view('admin.posts');
  })->name('admin.posts');
  Route::get('postdata', function() {
    $data = App\posts::all();
    return response()->json($data);
  });
  Route::get('deletepost/{id}', 'adminController@deletepost');
});
