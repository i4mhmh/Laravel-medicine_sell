@extends('\Admin\layout')

@section('title','展示销售员')

@section('topbar')
    @parent
@endsection

@section('content')
<table class="table">
<a href="/admin/add_member"><button class="btn btn-default">新增用户</button> </a>
<br>
<div class="row">
    <thead>
        <td>用户ID</td>
        <td>用户名</td>
        <td>分管地区</td>
        <td>操作</td>
    </thead>
@foreach ($datas as $data)
        <tbody>
            <td>{{$data -> sale_username}}</td>
            <td>{{$data -> name}}</td>
            <td>{{$data -> control_area}}</td>
        <td><a href="/admin/del_sale?id={{$data -> sale_username}}"><button class="btn btn-default">删除</button></a></td>
        </tbody>
    </div>

@endforeach

</table>
@endsection
