<style type="text/css">
    .form-horizontal .form-group {
        margin-left: 4px;
        margin-right: 4px;
    }
</style>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">用户名</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">邮箱</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="email" id="tag" value="{{ $email }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">角色</label>
    <div class="col-sm-9">
            @if($roles) 
            @foreach($roles as $item)
            <div class="col-md-4" style="float:left;">
                <span class="checkbox-custom checkbox-default">
                    <input class="form-actions" id="inputChekbox{{$item['id']}}" type="Checkbox" value="{{$item['id']}}" name="roles[]" @if(isset($adminRole)) @if(in_array($item['id'], $adminRole)) checked @endif @endif>
                    <label for="inputChekbox{{$item['id']}}">{{$item['name']}}</label>
                </span>
            </div>
            @endforeach 
            @endif
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">密码</label>
    <div class="col-md-8">
        <input type="password" class="form-control" name="password" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">确认密码</label>
    <div class="col-md-8">
        <input type="password" class="form-control" name="confirmPassword" autofocus>
    </div>
</div>
