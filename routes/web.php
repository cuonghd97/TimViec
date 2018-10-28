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
});
Route::get('/viewpost/{id}', 'postController@viewpost')->name('viewpost');
