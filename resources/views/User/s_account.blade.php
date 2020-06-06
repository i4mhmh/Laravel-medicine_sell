@extends('layout')

@section('topbar')
    @parent
@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-md-offset-3">
    <table class="table table-hover">
        <thead>
            <table class="table table-striped">
                <caption><h4>请选择收货地址</h4></caption>
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>收货人姓名</td>
                            <td>收货地区</td>
                            <td>详细地址</td>
                            <td>电话/手机</td>
                            <td>操作</td>
                        </tr>
                    </thead>
                    @php
                        $demo = 0;
                    @endphp
                    <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $demo += 1 }}</td>
                        <td>{{$data -> name}}</td>
                        <td>{{$data -> address}}</td>
                        <td>{{$data -> area}}</td>
                        <td>{{$data -> phone}}</td>
                    <td><a href="s_deliver?id={{$data -> id}}"><button class="btn btn-default">选择此地址</button></a></td>
                    </tr>
                    @endforeach
                        
                    </tbody>
                </table>
        </tbody>
    </table>
</div>
</div>

@endsection