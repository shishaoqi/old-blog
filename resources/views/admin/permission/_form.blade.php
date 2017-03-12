<style type="text/css">
    .form-horizontal .form-group {
        margin-left: 4px;
        margin-right: 4px;
    }
</style>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限规则</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
        <input type="hidden" class="form-control" name="cid" id="tag" value="{{ $cid }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限名称</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="display_name" id="tag" value="{{ $display_name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限概述</label>
    <div class="col-md-8">
        <textarea name="description" class="form-control" rows="3">{{ $description }}</textarea>
    </div>
</div>