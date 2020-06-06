@extends('layout')

@section('topbar')
    @parent
@endsection

@section('content')
    <div class="col-md-6 col-md-offset-2">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>商品名称</th>
                    <th>商品数量</th>
                    <th>商品单价</th>
                    <th>订单日期</th>
                    <th>操    作</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $demo = 0;    
                @endphp
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $demo += 1 }}</td>
                        <td>{{ $data -> Item_name }}</td>
                        <td>{{ $data -> add_number}}</td>
                        <td>{{ $data -> price}} </td>
                        <td>{{ $data -> add_date }}</td>
                    <td><button id="change_number" class="btn btn-info" style="line-height: 1" value="{{ $data -> cart_id }}" onclick="cnum(event)" >修改</button>
                        <a href="del_cart?cart_id={{$data -> cart_id}}"><div class="btn btn-danger" style="line-height: 1" id="del_cart">删除</div></a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

        <div class="col-md-3 col-md-offset-8">
            <p style="font-family: 仿宋;font-weight: bold;font-size: 25px">总价: {{ $total ?? '' }}</p>
        </div>
        <div class="col-md-2 col-md-offset-8">
            <a href="/"><button type="button" class="btn btn-success">继续购物</button></a>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger" onclick="show_warn()">结算</button>
        </div>
    </div>
<div class="row">
    <!--
        购物车显示配送员 信息
        配送员修改密码 
    -->
    <div class="col-md-7 col-md-offset-2">
    <table class="table table-bordered">
        <center><caption>已提交订单</caption></center>
        <thead>
            <tr>
                <th>#</th>
                <th>商品名称</th>
                <th>商品数量</th>
                <th>商品单价</th>
                <th>订单日期</th>
                <th>状    态</th>
            </tr>
        </thead>
        <tbody>
            @php
                $demo = 0;    
            @endphp
                @foreach ($ds as $d)
                <tr>
                    <td>{{ $demo += 1 }}</td>
                    <td>{{ $d -> Item_name }}</td>
                    <td>{{ $d -> add_number}}</td>
                    <td>{{ $d -> price}} </td>
                    <td>{{ $d -> add_date }}</td>
                    <td>@if ($d -> state == 1)
                        等待配送
                    @endif
                    @if ($d -> state == 2)
                        正在配送
                    @endif
                    @if ($d -> state == 3)
                        配送完成
                    @endif
                    </td>

                </tr>
                @endforeach
        </tbody>
    </table>
    </div>
</div>  

@section('script')
    <script>
        function cnum(event){
            var obj=event.srcElement;
            var demo = prompt('请输入您要修改的件数',1)
            if(demo != null && demo!='' && !isNaN(demo) && demo !=0 ){
                url = '/cnum?num=' + demo + '&car_id=' + obj.value
                self.location = url
            }else{
                alert('数据不合法')
            }
        }
        function show_warn(){
            var key = confirm('是否结算');
            if(key == true){
                self.location = '/s_account';
            }
        }
    </script>
@endsection
@endsection