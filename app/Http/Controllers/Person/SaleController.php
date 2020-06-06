<?php

namespace App\Http\Controllers\Person;

use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SaleController extends Controller
{

    #登录判断
    public function login_check(Request $request){
        $this -> validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
        $db = DB::table('sale_table');
        $user_data = $db -> where('sale_username','=',$request -> username) -> first();
        if($user_data){
            if(Crypt::decrypt($user_data -> sale_password) == $request -> password){
                $request -> session() -> put('sale_data',$user_data);
                return redirect('sales\index');
            }
            else{
                return back() -> withErrors('用户名或密码错误');
            }
        }else{
            return back() -> withErrors('用户名或密码错误');
        }
    }

    #主界面
    public function index(Request $request){
        if(session('sale_data')){
            $weekarray=array("日","一","二","三","四","五","六");
            $sale_date = "星期".$weekarray[date("w")];
            $delivery_datas = DB::table('delivery') -> where('address','=',session('sale_data') -> control_area) -> get();
            $shop_datas = DB::table('shop_car') -> where('state','!=',0) -> get();
            return view('sales\index', ['delivery_datas' => $delivery_datas,'shop_datas' => $shop_datas]) -> with('sale_date',$sale_date);
        }else{
            return redirect('worker_login');
        }
    }

    public function to_delivery(Request $request){
        $c_id = $request -> get('id');
        $db = DB::table('shop_car');
        $data = $db -> where('cart_id','=',$c_id) -> get();
        $demo = $request -> session() -> get('sale_data') -> sale_username;
        $res = $db -> where('cart_id','=',$c_id) -> update(['state' => 2, 'sale_username' => $demo]);
        if($res){
            return redirect('sales/index');
        }
    }

    public function to_end(Request $request){
        $c_id = $request -> get('id');
        $db = DB::table('shop_car');
        $data = $db -> where('cart_id','=',$c_id) -> get();
        $res = $db -> where('cart_id','=',$c_id) -> update(['state' => 3]);
        if($res){
            return redirect('sales/index');
        }
    }

    public function sale_center(Request $request){
        $db = DB::table('sale_table');
        $sale_id =  $request -> session() -> get('sale_data');
        if($sale_id){
            return view('sales\sale_center', ['sale_id' => $sale_id]);
        }else{
            echo '404';
        }
        
    }
    public function sale_fixpwd(Request $request){
        $this -> validate($request,[
            'oldpass' => 'required',
            'password' => 'required',
            'password_comfirmation' => 'required|same:password', 
        ]);
        $db = DB::table('sale_table');
        $sale_username = $request -> session() -> get('sale_data') -> sale_username;
        $res = $db -> where('sale_username','=',$sale_username) -> first();
        if(Crypt::decrypt($res -> sale_password) == $request -> POST('oldpass')){
            $res = $db -> where('sale_username','=',$sale_username) -> update(['sale_password' => Crypt::encrypt($request -> POST('password'))]);
            if($res){
                return redirect('/sales/exit_login');
            }else{
                echo '修改失败';
            }
        }else{
            echo '密码错误';
        };
    }

    public function exit_login(Request $request){
        $request -> session() ->flush();
        return redirect('/');
    }
    
}
