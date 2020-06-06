@extends('Admin.layout')

@section('title','显示中药')
    
@section('topbar')
    @parent
@endsection

@section('content')
<div class="row">
    <a href="/admin/add_medicine"><button class="btn btn-default">新增药品</button></a>
    
    <a href="/admin/show_cm"><button class="btn btn-default">展示中药</button></a>
    <a href="/admin/show_xy"><button class="btn btn-default">展示西药</button></a>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <td>药品id</td>
                        <td>名称</td>
                        <td>剩余数量</td>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
        <tr>
            <td>{{$data -> id}}</td>
            <td>{{$data->medicine_name}}</td>
            <td>{{$data -> medicine_number}}</td>

        </tr>
            @endforeach
                            
    </tbody>
</table>
</div>
@endsection