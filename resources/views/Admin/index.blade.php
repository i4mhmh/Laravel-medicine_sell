@extends('Admin.layout')

@section('title','管理员主页')

@section('topbar')
    @parent
@endsection

@section('content')
<a href="/admin/add_medicine"><button class="btn btn-default">新增药品</button></a>
    
<a href="/admin/show_cm"><button class="btn btn-default">展示中药</button></a>
<a href="/admin/show_xy"><button class="btn btn-default">展示西药</button></a>
    <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <td>药品id</td>
                            <td>名称</td>
                            <td>剩余数量</td>
                            <td>药品种类</td>
                            <td>操作</td>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
            <tr>
                <td>{{$data -> id}}</td>
                <td>{{$data->medicine_name}}</td>
                <td>{{$data -> medicine_number}}</td>
                <td>
                    {{$data->medicine_type}}
                </td>
                <td>
                <a href="admin/del_medicine?id={{ $data -> id }}"><button class="btn btn-danger">删除</button></a>
                </td>
            </tr>
                @endforeach
                                
        </tbody>
    </table>
</div>
@endsection


