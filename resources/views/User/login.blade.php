<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <style>
    </style>
</head>
<body>
    <div class="page-header" id="page-header">
        <a href="/"><h1>帝一方</h1></a>
    </div>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="thumbnail">    
                    <img src="img/xyNrM6Yr2M02bpmUNbOdMmIW7dRMGh1j4p0kR2di.jpeg" class="imt-responsive">
                    <form action="login_check" method="POST">
                        @csrf
                        <div class="form-group">
                            <br>
                            <label for="username">用户名</label>        
                                <input type="text" name="username" class="form-control">
                            </label>
                        </div>
                        <div>
                            <label for="password">密码</label>        
                                <input type="password" name="password" class="form-control">
                            </label>
                        </div>
                        
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-default">登录</button>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="forget_passwd" class="btn btn-default" style= "text-align:right">忘记密码</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
