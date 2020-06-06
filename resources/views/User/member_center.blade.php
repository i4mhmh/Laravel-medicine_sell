@extends('layout')

@section('topbar')
    @parent
@endsection

@section('content')
<div class="row">
    <div class="col-md-1 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                个人中心
            </div>
            <ul class="list-group">
                <li class="list-group-item" style="text-decoration: underline"><a href="/member_center">个人资料</a> </li>
                <li class="list-group-item"> <a href="delivery_address">收货地址</a></li>
                <li class="list-group-item"><a href="change_passwd">修改密码</a></li>
            </ul>
        </div>
    </div>
    <br>
    <div class="col-md-8" style="border: solid 0.1px #404040;">
    <p><br>
        您的个人信息：
    </p>
        <div class="col-md-3 col-md-offset-1">
            <p>会员名:{{ $member_data -> username }}</p>
            <p>家庭住址:{{ $member_data -> home }}</p>
            <p>电话:{{ $member_data -> phone }}</p>
            <p>真实姓名:{{ $member_data -> real_name }}</p>
        </div>
        <hr style="filter: alpha(opacity=100,finishopacity=0,style=2)" width="80%" color="#6f5499" size="10"/>


    </div>
</div>

@endsection