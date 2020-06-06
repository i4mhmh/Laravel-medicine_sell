@extends('layout')

@section('topbar')
    @parent
@endsection
@section('style')
<script type="text/javascript" src="js/area.js"></script>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">
            用户注册
        </h1>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">用户名:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="请输入用户名" name="username" id="username">
              </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" placeholder="请输入密码" name="password" id="password">
                </div>
              </div>
            <div class="form-group">
                <label for="rpass" class="col-sm-2 control-label">重复密码:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" placeholder="请重复确认密码" name="password_confirmation" id="password_confirmation" onkeyup="confirm_pass()">
                </div>
            </div>
            <span id='demo'></span>
            <div class="form-group">
                <label for="real_name" class="col-sm-2 control-label">真实姓名:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="请输入真实姓名" name="real_name" id="real_name">
                </div>
            </div>

            <div class="form-group">
                <label for="home" class="col-sm-2 control-label">家庭住址:</label>
                <div class="col-md-2">
                  <div class="form-group">
                    <select name="city" id="city"></select>
                    <select name="area" id="area"></select>
                  </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="phone" >手机号:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="请输入手机号">
                </div>
            </div>
            <span id='num_demo'></span>
            <div class="form-group">
                <label class="col-sm-2 control-label">上传头像(仅支持jpg/png)</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="img" id="img">
                </div>
              </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default" id="submit">登录</button>
              </div>
            </div>
            @csrf
            
          </form>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>

@endsection

@section('script')
<script>
  function confirm_pass(){
    var password = document.getElementById('password').value;
    var rpass = document.getElementById('password_confirmation').value;
    if (password == rpass){
      document.getElementById('demo').innerHTML="两次密码相同";
      document.getElementById('submit').disabled = false;
    }else{
      document.getElementById('demo').innerHTML='两次密码不同';
      document.getElementById('submit').disabled = true;
    }
  }


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
  
</script>
@endsection

@section('footer')
<footer class="navbar-fixed-bottom">
  <br>
  <div class="container">
      &copy;全世界的面我都吃一遍    
  </div>
  <br>
</footer>
@endsection
