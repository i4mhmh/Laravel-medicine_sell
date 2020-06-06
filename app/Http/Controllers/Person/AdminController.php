<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\drug;
use App\member;
use App\sales;
Use Crypt;


class AdminController extends Controller
{
    //定义用户登录界面
    public function login(Request $request){
        $request -> session() -> flush();
        $username = $request -> input('username');
        $password = $request -> input('password');
        #取出数据后转向数据库查询对比
        $db = DB::table('admin_table');
        $usercheck = $db -> where('name','=',$username);
        //检测是否存在该用户
        if($usercheck -> exists()){
            //用户存在取出密码
            $passcheck = $db -> where('name','=',$username) -> value('password');
            if($password == $passcheck){
                $request -> session() -> put('Admin_name',$username);
                return redirect('admin/') -> send();
            }else{
                return '密码错误';
            }
        }else{
            //不存在返回用户名输入错误
            return 'null';
        }
    }

    //查询所有药品
    public function show_all(Request $request){
        if($request -> session() -> get('Admin_name') == null){
            return redirect('worker_login');
        }
        $datas = drug::all();
        return view('Admin.index',['datas' => $datas]);
    }
    //查询中药
    public function show_cm(){
        $datas = drug::where('medicine_type','=','中药') -> get();
        return view('Admin.show_cm',['datas' => $datas]);
    }
    //xiyao
    public function show_xy(){
        $datas = drug::where('medicine_type','=','西药') -> get();
        return view('Admin.show_xy',['datas' => $datas]);
    }
    
    //展示用户
    public function show_user(){
        $datas = member::all();
        return view('Admin.show_user',['datas' => $datas]);
    }

    //删除用户
    public function del_member(Request $request){
        $id = $request -> get('id');
        $res = member::where('Id', $id) -> delete();
        if($res){
            return redirect('/admin/show_user');
        };
    }

    //增加用户
    public function add_member_check(Request $request){
        $name = $request -> input('name');
        $number = $request -> input('number');
        $passwd = $request -> input('password');
        $phone = $request -> input('phone');
        $home = $request -> input('sale_home');
        $area = $request -> input('area');
        $passwd = Crypt::encrypt($passwd);
        $member = new sales();
        $member -> name = $name;
        $member -> sale_username = $number;
        $member -> sale_password = $passwd;
        $member -> sale_phone = $phone;
        $member -> sale_home = $home;
        $member -> control_area = $area;

        if($member -> save() == true){
            echo '插入成功';
            return redirect('admin\show_sales');
        }else{
            echo '插入失败';
            return view('admin\add_member');
        };
    }

    //展示销售员
    public function show_sales(Request $request){
        $datas = sales::all();
        return view('Admin.show_sales',['datas' => $datas]);
    }

    //删除销售员
    public function del_sale(Request $request){
        $id = $request -> get('id');
        $res = sales::where('sale_username', $id) -> delete();
        if($res){
            return redirect('/admin/show_sales');
        }else{
            return redirect('/admin/show_sales');
        };
    }

    //修改用户信息
    /*public function change_member($id){
        $data = member::find($id);
    }*/

    //新增药品
    public function add_medicine_check(Request $request){
        $this -> validate($request, [
            'medicine_name' => 'required|max: 255',
            'medicine_number' => 'required|numeric|max:99999',
            'medicine_price' => 'required|numeric|max: 255',
            'medicine_text' => 'required',
            'medicine_effect' => 'required',
            'medicine_img' => 'required',
        ]);
        $drug = new drug();
        $drug -> medicine_name = $request -> medicine_name;
        $drug -> medicine_number = $request -> medicine_number;
        $drug -> medicine_type = $request -> medicine_type;
        $drug -> medicine_price = $request -> medicine_price;
        $drug -> medicine_effect = $request -> medicine_effect;
        $drug -> medicine_text = $request -> medicine_text;
        $path = $request -> file('medicine_img') -> storeAs('/img', $request -> medicine_name.'.jpg');
        $drug -> medicine_img = 'storage/img/'.$request -> medicine_name.'.jpg';
        $drug -> save();
        return redirect('\admin');
    }

    public function del_medicine(Request $request){
        $del_name = $request -> get('id');
        $db = DB::table('medicine_Data');
        $res = $db -> where('id', '=', $del_name) -> delete();
        if($res){
            return redirect('/admin');
        }else{
            echo '删除失败';
        }
    }

    //退出登录
    public function exit_admin(Request $request){
        $request -> session() -> flush();
        return redirect('/');
    }
}
