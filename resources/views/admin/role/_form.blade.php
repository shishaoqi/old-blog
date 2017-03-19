<style type="text/css">
    .form-horizontal .form-group {
        margin-left: 4px;
        margin-right: 4px;
    }
</style>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色名称</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name" value="{{ $name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色用意</label>
    <div class="col-md-8">
        <textarea name="display_name" class="form-control" rows="3">{{ $display_name }}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色概述</label>
    <div class="col-md-8">
        <textarea name="description" class="form-control" rows="3">{{ $description }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限列表</label>
</div>
<div class="form-group">
    <div class="form-group">
        @if($permissionAll)
            @foreach($permissionAll[0] as $v)
                <div class="form-group">
                    <label class="control-label col-md-3 all-check">{{$v['name']}}</label>
                    <div class="col-md-8">
                        @if(isset($permissionAll[$v['id']]))
                            @foreach($permissionAll[$v['id']] as $vv)
                                <div class="col-md-4" style="float:left;padding-left:20px;margin-top:8px;">
                                    <span class="checkbox-custom checkbox-default">
                                        <i class="fa"></i>
                                        <input class="form-actions" id="inputChekbox{{$vv['id']}}" type="Checkbox" value="{{$vv['id']}}" name="permissions[]"@if(isset($permissions)) @if(in_array($vv['id'], $permissions)) checked @endif @endif>
                                        <label for="inputChekbox{{$vv['id']}}">{{$vv['name']}}</label>
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<script>
    $(function () {
        $('.all-check').on('click', function () {

        });
    });
</script>

