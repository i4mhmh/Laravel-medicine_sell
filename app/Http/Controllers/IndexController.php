<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\drug;


class IndexController extends Controller
{
    //定义index商品
    public function index(){
        $datas = drug::all();
        return view('index',['datas' => $datas]);
    }
    
    //定制商品详情页
    public function medicine_content(Request $request){
        $medicine_id =  $request -> get('id');
        $res = drug::find($medicine_id);
        //判断是否存在
        if($res == null){
            return 404;
        }else{
            return view('medicine_context',['drug' => $res]);
        };
    }

}
