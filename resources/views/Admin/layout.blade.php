<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="{{URL::asset('js/bootstrap.min.js')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
</head>
<body>
@if (session('Admin_name') === null)
    
@endif
    @section('topbar')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">            
            <a class="navbar-brand" href="#">帝一方</a>
          </div>      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li @if(Request::is('admin')) class="active" @endif ><a href="/admin"><span class="glyphicon glyphicon-home"></span> 管理员主页</a>
              </li>
              <li @if ($_SERVER['REQUEST_URI'] == '/admin/show_user')
                  class="active"
              @endif><a href="/admin/show_user">会员列表</a>
              </li>
              <li @if ($_SERVER['REQUEST_URI'] == '/admin/show_sales')
                  class="active"
              @endif><a href="/admin/show_sales">销售员列表</a>
              </li>
            </ul> 
            <ul class="nav navbar-nav navbar-right">
              <li> <a href="/">返回主页</a></li>
              <li> <a href="/admin/exit_admin">退出登录</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user">{{session('Admin_name')}}</span></a></li>
                

            
          </div>
        </div>
      </nav>
      @show

      <div class="container">
          @yield('content')
      </div>
</body>
</html>