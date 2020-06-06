@extends('\Admin\layout')

@section('title','展示用户')

@section('topbar')
    @parent
@endsection

@section('content')
<table class="table table-bordered">

<br>
<div class="row">
    <thead>
        <td>用户ID</td>
        <td>用户名</td>
        <td>操作</td>
    </thead>
@foreach ($datas as $data)

        <tbody>
            <td>{{$data -> Id}}</td>
            <td>{{$data -> username}}</td>
        <td><a href="/admin/del_member?id={{$data -> Id}}"><button class="btn btn-default">删除</button></a></td>
        </tbody>
    </div>

@endforeach

</table>
@endsection
