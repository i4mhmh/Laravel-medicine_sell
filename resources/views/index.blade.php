@extends('layout')

@section('topbar')
    @parent
@endsection
@section('content')
      <!--
        显示商品
        -->
  <center><div class="jumbotron">
    <h1>您好 {{session('username')}}</h1>
    现在时间：
    <div id="datetime">
      <script>
          setInterval("document.getElementById('datetime').innerHTML=new Date().toLocaleString();", 1);
      </script>
  </body>
  
    </div>
  </center>
  <div class="container">
    <div class="row">
      <div class="page-header">
        <center> <h1>药品一览</h1> </center>
      </div>
        @foreach ($datas as $data)
        <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
        <a href="show_medicine_context?id={{$data -> id}}" class="thumbnail">
          <img src="{{$data -> medicine_img}}" style="width: 242px;height: 134px"  class="img-thumbnail">
          </a>
          <div class="caption">
              <center> <h3>{{$data -> medicine_name}}</h3> </center>
          <p>{{ $data -> medicine_effect }}</p>
              <div style="text-align:right">
                <a href="show_medicine_context?id={{$data -> id}}" class="btn btn-default">查看详情</a>
              </div>
          </div>
        </div>
        </div>
        @endforeach
      
    </div>
  </div>  
@endsection
</body>
</html>

