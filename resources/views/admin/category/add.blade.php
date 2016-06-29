@extends('layouts.admin') @section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">Native Elements</h1>
        <p class="description">Plain text boxes, select dropdowns and other basic form elements</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
            </li>
            <li>
                <a href="forms-native.html">Forms</a>
            </li>
            <li class="active">
                <strong>Native Elements</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Default form inputs</h3>
                <div class="panel-options">
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>
                    <a href="#" data-toggle="remove">
            &times;
        </a>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{url('admin/category')}}" method="post" role="form" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" id="field-19" name="pid" value="{{ $pid }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-1">分类名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-1" name="name">
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-2">标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-2" name="title">
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-3">关键字</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="field-3" name="keywords">Example block-level help text here. Emails inputs are validated on native HTML5 forms.</p>
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-3">排序</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="field-3" placeholder="" name="order">
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-5">描述</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="5" id="field-5" name="description"></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group-separator"></div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select list</label>
                        
                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success">提交</button>
                            <button type="reset" class="btn btn-white">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
