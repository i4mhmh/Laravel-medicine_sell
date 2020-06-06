@extends('Admin.layout')

@section('title','增加用户')
    
@section('topbar')
    @parent
@endsection
@section('content')
<form action="add_member_check" method="post">
    <p>账号: <input type="text" name="number"></p>
    <p>姓名: <input type="text" name="name"></p>
    <p>密码: <input type="password" name="password"></p>
    <p>确认密码：<input type="password" name="password_confirmation"></p>
    <p>手机号：<input type="text" name="phone"></p>
    <p>家庭住址：<input type="text" name="sale_home"></p>
    <p>分管区域：<input type="text" name='area'></p>
     @csrf
     <input type="submit" value="提交">
</form>
@endsection