@extends('layout')

@section('topbar')
@parent
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <br><br><br><br>
            <div class="thumbnail">
                <img src="{{$drug->medicine_img}}" alt="图片" style="width: 242px;height: 280px">
            </div>
        </div>
       
        <div class="col-md-4">
            <center>
            <br><br><br><br>
            <h3>{{$drug -> medicine_name}}</h3>
        </div>
            </center>
        <div class="col-md-4">
            <h4>&nbsp;&nbsp;价格: &nbsp;$ {{$drug -> medicine_price}}</h4>
        </div>
        <div class="col-md-4">
            <h4>&nbsp;&nbsp;标签: &nbsp;{{$drug -> medicine_effect}}</h4>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <br><br><br><br><br>
         <button class="btn btn-primary" onclick="add_cart()"><span class="glyphicon glyphicon-shopping-cart"></span>加入购物车</button>
            {{ $errors }}
        </div>
    </div>
    <br>
    <br>
    <!--
        简介
    -->
    <div class="well" >
        <center><h1>产品介绍</h1></center>
        <div class="col-md-offset-2">
            {!! $drug -> medicine_text !!}
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    function add_cart(){
        var demo=prompt('请输入您要购买的件数')
        if(!isNaN(demo) && demo!=null){
            url = 'add_cart?item_id=' + {{ $drug -> id }} + '&num=' + demo
            self.location=url
        }else{
            alert('您的输入不合法')
        }
    }
</script>

@endsection

@section('footer')
    @parent
@endsection