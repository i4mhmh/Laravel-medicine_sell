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

Route::get('/','IndexController@index');

/***** 
    用户处理
*/
# 登录处理
Route::get('/login', function () {
    return view('User.login');
});

#用户中心
Route::get('/member_center','Person\UserController@member_center');
Route::get('/delivery_address', 'Person\UserController@delivery_address');
Route::post('/delivery_address','Person\UserController@delivery_compose');
Route::match(['get', 'post'], '/change_passwd', 'Person\UserController@change_passwd');



# 注册处理 can't found another way to slove this question
Route::get('/login_in',function(){
    return view('User.login_in');
});
Route::post('/login_in','Person\UserController@login_in');

#加入购物车
Route::get('/add_cart','Person\UserController@add_cart');
#修改订单
Route::get('cnum','Person\UserController@cnum');
#删除订单
Route::get('del_cart','Person\UserController@del_cart');
#返回购物车
Route::get('/my_cart',function(){
    return view('User.my_cart');
});
#结账
Route::get('/s_account','Person\UserController@s_account');
Route::get('/del_delivery', 'Person\UserController@del_delivery');
#退出
Route::get('/user_exit','Person\UserController@user_exit');
Route::post('/login_check','Person\UserController@login');
Route::get('/shop_car','Person\UserController@shop_car');



/*****
 * 用户处理结束
 */
#管理员
Route::get('/worker_login', function () {
    return view('Admin.login');
});
Route::post('/admin_check','Person\AdminController@login');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/del_member', 'Person\AdminController@del_member');
    Route::get('/del_sale', 'Person\AdminController@del_sale');


    Route::get('/', 'Person\AdminController@show_all');

    Route::get('/del_medicine', 'Person\AdminController@del_medicine');

    Route::get('/show_cm','Person\AdminController@show_cm');
    
    Route::get('/show_user', 'Person\AdminController@show_user');

    Route::get('/del_member/{id}','Person\AdminController@del_member');

    Route::get('show_xy', 'Person\AdminController@show_xy');

    Route::get('show_sales', 'Person\AdminController@show_sales');

    Route::get('/add_member', function () {
        return view('Admin.add_sale');
    });

    Route::post('/add_member_check','Person\AdminController@add_member_check');

    Route::get('/add_medicine',function(){
        return view('Admin\add_medicine');
    });
    Route::post('/add_medicine_check','Person\AdminController@add_medicine_check');
    //Route::get('/add_member','Person\AdminController@add_member');
    //退出
    Route::get('/exit_admin','Person\AdminController@exit_admin');
});

    Route::get('test',function(){
        return view('test');
    });


Route::get('/show_medicine_context','IndexController@medicine_content');

#销售员sale模块
Route::group(['prefix' => 'sales'], function () {
    Route::post('/login', 'Person\SaleController@login_check');
    Route::get('/index', 'Person\SaleController@index');
    Route::get('exit_login', 'Person\SaleController@exit_login');
    Route::get('todelivery', 'Person\SaleController@to_delivery');
    Route::get('toend', 'Person\SaleController@to_end');
    Route::get('sale_center', 'Person\SaleController@sale_center');
    Route::post('sale_center', 'Person\SaleController@sale_fixpwd');
});

Route::get('/s_deliver','Person\UserController@s_delivery');