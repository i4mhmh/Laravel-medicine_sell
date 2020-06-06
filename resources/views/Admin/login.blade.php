<!DOCTYPE html>
<html>
<head>
	<title>工作人员登录</title>
		<meta charset="utf-8">
        <link rel="stylesheet" href="css/sale/style.css">
        <link rel="stylesheet" href="js/bootstrap.min.js">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>工作人员登录</h1>
					<div class="head">
						<img src="img/user.png" alt=""/>
					</div>
				<form action="sales/login" name="login" method="POST">
						<input type="text" class="text" placeholder="请输入您的用户名" id="username" name="username">
                        <input type="password" id="password" name="password" placeholder="请输入您的密码">
                        @csrf
						<div class="submit">
							<a href=""><input type="submit" value="销售员登录" ></a>
							&emsp;&emsp;&emsp;&nbsp;
							<input type="submit" value="管理员登录" onclick="admin_login()">
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
                        <p><a href="/">返回首页</a></p>
				</form>
			</div>
		</div>
			 <!-----//end-main---->
<script>
    function admin_login(){
        document.login.action='admin_check';
        document.login.submit();
    }
</script>
</body>

</html>