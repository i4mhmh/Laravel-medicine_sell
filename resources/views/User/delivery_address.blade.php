@extends('layout')

@section('topbar')
    @parent
@endsection

@section('style')
<script type="text/javascript" src="js/area.js"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-1 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                个人中心
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="/member_center">个人资料</a> </li>
                <li class="list-group-item" style="text-decoration: underline"> <a href="delivery_address">收货地址</a></li>
                <li class="list-group-item"><a href="/change_passwd">修改密码</a></li>
            </ul>
        </div>
    </div>
    <br>
    <div class="col-md-8" style="border: solid 0.1px #404040;">
        <div class="col-md-6">

            <br>
            <p style="color: red">新增收货地址</p>
            <form role="form" action="#" method="POST">
                <div class="form-group">
                    <label for="">*选择地区:</label>
                    <select name="city" id="city"></select>
                    <select name="area" id="area" value='123456'></select>
                </div>
                <div class="form-group">
                    <label for="addr">*详细地址:</label>
                    <textarea id="addr" name="addr" style="margin: 0px; width: 280px; height: 78px; vertical-align: middle;" placeholder="请输入您的详细地址(精确到街道)"></textarea>
                </div>
                <div class="form-group">
                    <label for="">*收货人姓名:</label>
                    <input type="text" name="username" id="username" placeholder="请输入收货人姓名"/>
                </div>
                <div class="form-group">
                    <label for="">*手机号码 :</label>
                    <input type="text" name='number' id="number" placeholder="请输入收货人手机号"/>
                </div>
                @csrf
                @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <center><input type="submit" value="保存"/></center>
                <br><br>
            </form>
        </div>
        
        <hr style="filter: alpha(opacity=100,finishopacity=0,style=2)" width="80%" color="#6f5499" size="10"/>
        <table class="table table-striped">
        <caption><h4>收货地址</h4></caption>
            <thead>
                <tr>
                    <td>#</td>
                    <td>收货人姓名</td>
                    <td>收货地区</td>
                    <td>详细地址</td>
                    <td>电话/手机</td>
                    <td>操作</td>
                </tr>
            </thead>
            @php
                $demo = 0;
            @endphp
            <tbody>

                    @foreach ($delivery_datas as $data)
                    <tr>
                        <td>{{ $demo += 1 }}</td>
                        <td>{{$data -> name}}</td>
                        <td>{{$data -> address}}</td>
                        <td>{{$data -> area}}</td>
                        <td>{{$data -> phone}}</td>
                    <td><a href="/del_delivery?id={{ $data -> id }}">删除</a></td>
                    </tr>
                    @endforeach
                
            </tbody>
        </table>
        您已经保存{{ $demo }}个收货地址,还能再建{{ 5 - $demo }}个
        
    <div class="col-md-3 col-md-offset-1">
    </div>
    <br>
    </div>
</div>

@endsection

@section('script')
<script>
    var city = document.getElementById('city')
    var area = document.getElementById('area')

    var city_con = '郑州市';
    var area_con = '中原区';
    for(var x in obj){
        var node = document.createElement("option");
        node.innerHTML = x;
        city.appendChild(node);
    }
    for(x in obj[city_con][0]){
        var node=document.createElement("option");
        node.innerHTML=x;
        area.appendChild(node);
    }
    city.onchange=function(){
        var city_sel = city[this.selectedIndex].innerHTML
        var area_sel = obj[city_sel][0];
        area.innerHTML = '';
        for(var x in area_sel){
            var node = document.createElement("option")
            node.innerHTML = x;
            area.appendChild(node);
        }
    }
</script>
@endsection