@extends('layout')

@section('topbar')
    @parent
@endsection

@section('content')
<div class="row">
    <div class="col-xs-1 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                个人中心
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="member_center">个人资料</a> </li>
                <li class="list-group-item"> <a href="delivery_address">收货地址</a></li>
                <li class="list-group-item" style="text-decoration: underline"><a href="change_passwd">修改密码</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-8" style="border: solid 0.1px #404040;">
        <p><br>
        </p>
            <div class="col-md-3 col-md-offset-1">
                <form action="change_passwd" method="POST">
                    <div class="form-group">
                        <label for="pass1">原密码</label>
                        <input type="text" class="form-control" name="pass1" placeholder="请输入原密码">
                    </div>
                    <div class="form-group">
                        <label for="passwd1">新密码</label>
                        <input type="text" class="form-control" name="passwd1" placeholder="请输入新密码">
                    </div>
                    <div class="form-group">
                        <label for="">重复新密码</label>
                        <input type="text" class="form-control" name="passwd2" placeholder="请重复输入新密码">
                    </div>
                    {{ $msg ?? '' }}
                    @csrf
                    <input type="submit" value="提交">
                    <br>
                </form>
                <br>
            </div>
        </div>
    <br>
    <div class="col-md-3 col-md-offset-1">
    </div>
    <br>
    </div>
</div>
@endsection