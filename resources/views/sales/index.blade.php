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
              <li @if (Request::is('sales/index'))
              class="active"
              @endif ><a href="#">主页<span class="sr-only">(current)</span></a></li>
              <li><a href="sale_center">个人中心</a></li>
            </ul>

            <!--右侧-->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="exit_login" class="glyphicon glyphicon-log-out">退出登录</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="jumbotron" style="color: #6f5499">
          <div class="container">
          <h1>{{ session('sale_data') -> name }},欢迎您</h1>
        <p style="color: #6f5499">今天是{{ $sale_date }},请检查需要配送的订单信息。</p>
    </div>
      </div>
        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <table class="table table-hover">
                    <caption>订单列表</caption>
                    <thead>
                      <tr>
                        <td>#</td>
                        <th>客户姓名</th>
                        <th>药品（件数）</th>
                        <th>配送地址</th>
                        <th>联系电话</th>
                        <th>下单日期</th>
                        <th>总金额</th>
                        <th>操作</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $num=0
                        @endphp
                        @foreach ($delivery_datas as $delivery_data)
                            @foreach ($shop_datas as $shop_data)
                                @if ($delivery_data -> id == $shop_data ->shop_to_delivery && session('sale_data') -> control_area == $delivery_data -> address && $shop_data -> state < 3)
                                <tr>
                                <td>{{ $num += 1 }}</td>
                                <td>{{$delivery_data -> name}}</td>
                                <td>{{$shop_data -> Item_name}}({{$shop_data -> add_number}}件)</td>
                                <td>{{ $delivery_data -> address}}{{ $delivery_data -> area }}</td>
                                <td>{{ $delivery_data -> phone }}</td>
                                <td>{{$shop_data -> add_date}}</td>
                                <td>{{$shop_data -> price * $shop_data -> add_number}}</td>
                                <td>
                                @if ($shop_data -> state == 1)
                                <a href="/sales/todelivery?id={{$shop_data -> cart_id }}"><button class="btn btn-info">配送</button></a>
                                @elseif($shop_data -> state == 2)
                                <a href="/sales/toend?id={{$shop_data -> cart_id }}"><span class="label label-info">配送中（点击完成配送）</span></a>
                                </td>
                                </tr>
                                @endif
                                @endif
                            @endforeach
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1">
          <div class="panel panel-default">
              <table class="table table-hover">
                  <caption>已完成订单列表</caption>
                  <thead>
                    <tr>
                      <td>#</td>
                      <th>客户姓名</th>
                      <th>药品（件数）</th>
                      <th>配送地址</th>
                      <th>联系电话</th>
                      <th>下单日期</th>
                      <th>总金额</th>
                      <th>操作</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $num=0
                      @endphp
                      @foreach ($delivery_datas as $delivery_data)
                          @foreach ($shop_datas as $shop_data)
                              @if ($delivery_data -> id == $shop_data ->shop_to_delivery && session('sale_data') -> control_area == $delivery_data -> address && $shop_data -> state == 3)
                              <tr>
                              <td>{{ $num += 1 }}</td>
                              <td>{{$delivery_data -> name}}</td>
                              <td>{{$shop_data -> Item_name}}({{$shop_data -> add_number}}件)</td>
                              <td>{{ $delivery_data -> address}}{{ $delivery_data -> area }}</td>
                              <td>{{ $delivery_data -> phone }}</td>
                              <td>{{$shop_data -> add_date}}</td>
                              <td>{{$shop_data -> price * $shop_data -> add_number}}</td>
                              <td>
                              @if ($shop_data -> state == 3)
                              <span class="label label-success">配送完毕</span>
                              </td>
                              </tr>
                              @endif
                              @endif
                          @endforeach
                    @endforeach
                  </tbody>
                </table>
          </div>
      </div>  
      </div>
</body>
</html>