@section('topbar')
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>主页</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <style>
        footer{
            background-color:gainsboro;
        }
        h3{
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
@section('style')
@show
</head>
<body>

    <nav class="navbar navbar-default" >
        <div class="container-fluid">
          <div class="navbar-header">            
            <a class="navbar-brand" href="/">帝一方</a>
          </div>      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
              <ul class="nav navbar-nav">
                <li @if(Request::is('')) cl
                ass="active" @endif><a href="/"><span class="glyphicon glyphicon-home"></span>主页</a>
              </ul>
                <li>
                @if (session('username') === null)
                <a href="worker_login"><span class="glyphicon glyphicon-list
                  "></span> 工作人员入口</a></li>
                <li><a href="login"><span class="glyphicon glyphicon-user">登录</span></a></li>
                @else
                <li @if(Request::is('member_center')) class="active" @endif><a href="member_center"><span class="glyphicon glyphicon-user"></span>个人中心</a></li>
                <li @if(Request::is('shop_car')) class="active" @endif><a href="shop_car"><span class="glyphicon  glyphicon-shopping-cart"></span>购物车</a></li>
                <li><a href="user_exit?del_id={{session('username')}}">退出登录</a></li>
                @endif
                @if (session('username') === null)
                <li @if (Request::is('login_in'))
                    class='active'
                @endif><a href="login_in"><span class="glyphicon glyphicon-edit">注册</span></a></li>
                @endif
                

                

                
            </ul>
            
          </div>
        </div>
      </nav>
  @show

@section('content')

@show
@section('footer')
    <footer>
        <br>
        <div class="container">
            &copy;全世界的面我都吃一遍    
        </div>
        <br>
    </footer>
@show

</body>

@section('script')

@show

</html>