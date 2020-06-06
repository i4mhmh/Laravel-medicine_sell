<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>销售员主页</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/bootstrap.min.js">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="http://med.com/sales/index">个人主页</a>
          </div>
    
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index">主页<span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="sale_center">个人中心</a></li>
            </ul>

            <!--右侧-->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="exit_login" class="glyphicon glyphicon-log-out">退出登录</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <div class="panel panel-default">
          <div class="panel-body">
              <br><br><br>
              <div class="col-md-6 col-md-offset-3">
              <table class="table">
                <thead>
                  <th>姓名</th>
                  <th>电话</th>
                  <th>家庭住址</th>
                  <th>分管区域</th>
                </thead>
                <tbody>
                  <td>{{ $sale_id -> name }}</td>
                  <td>{{ $sale_id -> sale_phone}}</td>
                  <td>{{ $sale_id -> sale_home }}</td>
                  <td>{{ $sale_id -> control_area}}</td>
                </tbody>
              </table>
            </div>
            <br>
            <div class="col-md-5 col-md-offset-4">
              修改密码
             <form action="#" method="POST">
               <label for="passwd">旧密码</label>
               <input type="password" id="oldpass" name='oldpass' placeholder="请输入旧密码"><br>
               <label for="password">新密码</label>
               <input type="password" id="password" name="password" placeholder="请输入新密码"><br>
               <label for="password">重复新密码</label>
               <input type="password" id="password_comfirmation" name='password_comfirmation' placeholder="验证密码">
               @csrf
               <br>
               <input type="submit">
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
      </div>

</body>
</html>