@extends('Admin\layout')

@section('title','修改用户信息')

@section('topbar')
    @parent

    <form action="change_member" method="post">
        <tr>新姓名: <input type="text" name="" id=""></tr>
    </form>
@endsection