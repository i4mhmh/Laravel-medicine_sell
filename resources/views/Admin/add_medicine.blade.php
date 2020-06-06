@extends('Admin.layout')

@section('title','显示')

@section('topbar')
    @parent
@endsection

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            新增药品
        </h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="add_medicine_check" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">名字</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="请输入名字" name="medicine_name">
              </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">件数</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="请输入件数" name="medicine_number">
                </div>
              </div><div class="form-group">
                <label for="" class="col-sm-2 control-label">药品类型</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="请输入药品类型" name="medicine_type">
                </div>
              </div><div class="form-group">
                <label for="" class="col-sm-2 control-label">药品价格</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="请输入药品价格 单位/元" name="medicine_price">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">药品简介</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="请输入简介" name="medicine_text">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2 control-label">药品功效</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="请输入功效" name="medicine_effect">
                </div>
              </div>
              
  

              <div class="form-group">
                <label class="col-sm-2 control-label">上传药品图片(仅支持jpg/png)</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="medicine_img">
                </div>
              </div>
            @csrf
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">提交</button>
              </div>
            </div>
          </form>
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

</div>


@endsection
