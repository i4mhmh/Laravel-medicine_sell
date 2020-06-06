<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\shop_car;
use App\drug;
use App\member;
use App\delivery;
use Crypt;
use Pay;

class UserController extends Controller
{
    //定义注册
    public function login_in(Request $request){
        $this -> validate($request, [
            'username' => 'unique:user_table|required|alpha_num|max:255',
            'password' => 'required|confirmed|max:255',
            'password_confirmation' => 'required|max:255',
            'phone' => 'required|integer',
        ]);
        $file = $request -> file('img');
        $ext = $file -> getClientOriginalExtension();
        $check_box = array('jpg','png');
        if(!in_array($ext,$check_box)){
            return back() -> withErrors('图片格式有误');
        }
        $db = DB::table('user_table');
        $passwd_crypt = Crypt::encrypt($request -> get('password'));
        $res = $db -> insert([
            'username' => $request -> username,
            'password' => $passwd_crypt,
            'real_name' => $request -> real_name,
            'home' => $request -> city.$request -> area,
            'phone' => $request -> phone,
        ]);
        if($res){
            return redirect('login');
        }else{
            echo '注册失败';
        }
    }

    //定义用户登录界面
    public function login(Request $request){
        #先清空session
        $request -> session() -> flush();
        $username = $request -> input('username');
        $password = $request -> input('password');
        #取出数据后转向数据库查询对比
        $db = DB::table('user_table');
        $usercheck = $db -> where('username','=',$username);
        //检测是否存在该用户
        if($usercheck -> exists()){
            //用户存在取出密码
            $passcheck = $db -> where('username','=',$username) -> value('password');
            $passwordcheck = Crypt::decrypt($passcheck);
            $user_id = $db -> where('username','=',$username) -> value('Id');
            if($password == $passwordcheck){
                $request -> session() -> put('username',$username);
                $request -> session() -> put('id',$user_id);
                return redirect('/')->send();
            }else{
                return '密码错误';
            }
        }else{
            //不存在返回用户名输入错误
            return 'null';
        }
    }

    #用户退出返回到index
    public function user_exit(Request $request){
        $del_id = $request -> get('del_id');
        $request -> session() -> flush();
        return redirect('login');
    }

    #用户购物车
    public function shop_car(Request $request){
        $user_id = session('id');
        $db = DB::table('shop_car');
        $datas = $db 
                -> where('Id', '=', $user_id)
                -> where('state','=',0) 
                -> get();
        $total = 0;
        foreach ($datas as $data){
            $total += $data -> price * $data -> add_number;
        }
        $demo = DB::table('shop_car');
        $ds = $demo
        -> where('Id', '=', $user_id)
        -> where('state','!=',0) 
        -> get();
        return view('User\my_cart', compact('ds'),compact('datas'),['total' => $total]);
    }
    #修改订单数据
    public function cnum(Request $request){
        #接受参数修改数据表数据
        $db = DB::table('shop_car');
        $car_data = $db -> where('cart_id','=',$request -> get('car_id')) -> update(['add_number' => $request -> get('num')]);
        return redirect('/shop_car');
    }
    #删除订单
    public function del_cart(Request $request){
        $db = DB::table('shop_car');
        $db -> where('cart_id','=',$request -> get('cart_id')) ->delete();
        return redirect('/shop_car');
    }

    #结账展示
    public function s_account(Request $request){
        $db = DB::table('delivery');
        $datas = $db -> where('userid', '=', session('id')) -> get();
        return view('User\s_account', compact('datas'));
    }
    public function fix_account(Request $request){
        $db = DB::table('shop_car');
        $demo = $db -> where('Id','=', session('id')) -> update(['state' => 1]);
        if($demo){
            return redirect('/index');
        }
    }

    #用户中心
    public function member_center(){
        if(session('id') == null){
            return redirect('/login');
        }else{
            $member_data = member::where('id','=',session('id'))->first();
            return view('User\member_center',['member_data' => $member_data]);
        }
    }

    #收货地址
    public function delivery_address(){
        if(session('id') == null){
            return redirect('/login');
        }else{
            $datas = DB::table('delivery') -> where('userid','=',session('id')) -> get();
            return view('User\delivery_address', ['delivery_datas' => $datas]);
        }
    }

    public function delivery_compose(Request $request){
        if(session('id') == null){
            return redirect('/login');
        }else{
            $data_count = DB::table('delivery') -> where('userid','=',session('id')) -> count();
            if($data_count < 5){
                $this -> validate($request, [
                    'city' => 'required',
                    'area' => 'required',
                    'addr' => 'required',
                    'number' => 'required',
                    'username' => 'required',
                ]);
                $city = $request->get('city');
                $area = $request -> get('area');
                $addr = $request -> get('addr');
                $number = $request -> get('number');
                $username = $request -> get('username');

                $delivery = new delivery();
                $delivery -> userid = session('id');
                $delivery -> address = $city. $area;
                $delivery -> area = $addr;
                $delivery -> phone = $number;
                $delivery -> name = $username;
                $delivery -> save();
                return redirect() -> back();
            }else{
                $validator = '收货地址信息已上限,请删除或修改收货地址';
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }  
    }

    #修改密码
    public function change_passwd(Request $request){
        if($request->method() == 'GET'){
            if(session('id') == null){
                return redirect('/login') -> with('msg', '');
            }else{
                return view('User\change_passwd');
            }
        }else{
            $pass1 = $request -> get('pass1');
            $passwd1 = $request -> get('passwd1');
            $passwd2 = $request -> get('passwd2');
            if($passwd1 == $passwd2){
                $pass = member::where('Id','=',session('id')) -> value('password');
                if($pass1 == Crypt::decrypt($pass)){
                    $demo = DB::table('user_table') -> where('Id', '=', session('id')) -> update(['password' => Crypt::encrypt($passwd1)]);
                    $request -> session() -> flush();
                    return redirect('');
                }else{
                    return view('User\change_passwd', ['msg' => '原密码错误']);
                }
            }else{
                $msg = '两次输入密码不一致';
                return view('User\change_passwd', ['msg' => $msg]);
            }
        }  
    }

    #删除订单
    public function del_delivery(Request $request){
        $delivery_id = $request -> get('id');
        $res = DB::table('delivery') 
            -> where('userid','=',session('id')) 
            -> where('id','=',$delivery_id) -> delete();
        if($res){
            return redirect() -> back();
        }else{
            return redirect() -> back() -> withErrors('msg', '删除错误');
        }
    }


    public function session_check(){
        if(session('id') == null){
            return redirect('login') ->withErrors('请登录');
        }
    }
    public function add_cart(Request $request){
        if(session('id') == null){
            return redirect('login') ->withErrors('请登录');
        }
        $item_id = $request -> input('item_id');
        $num = $request -> input('num');
        $med_datas = DB::table('medicine_data') -> where('id', '=', $item_id) -> first();
        if ($med_datas){
            if($num > 0 && $num < 99999){
                $check_datas = DB::table('shop_car') -> where('Id', '=', session('id')) -> get();
                foreach($check_datas as $check_data){
                    if($check_data -> Item_name == $med_datas -> medicine_name && $check_data -> state == 0){
                        return back() -> withErrors('medicine exists');
                    }
                }
                #新建购物车数据
                $n_cart = new shop_car();
                $n_cart -> Item_name = $med_datas -> medicine_name;
                $n_cart -> Id = session('id');
                $n_cart -> add_number = $num;
                $n_cart -> price = $med_datas -> medicine_price;
                $n_cart -> state = 0;
                $n_cart -> save();
                return back() -> withErrors(['ok']);
            }
        }else{
            return back() -> withErrors(['same']);
        }
    } 

    public function s_delivery(Request $request){
        $userid = session('id');
        if($userid){
            $shop_car = DB::table('shop_car');
            $delivery_id = $request -> get('id');
            $shop_car -> where('Id','=',$userid) -> where('shop_to_delivery','=',null) -> update([
                'state' => 1,
                'shop_to_delivery' => $delivery_id,
            ]);
            return redirect('/shop_car');
        }else{
            return redirect('/login');
        }
    }
}

