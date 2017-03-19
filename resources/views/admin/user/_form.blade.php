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
    <div class="col-sm-8">
        <select class="form-control">
            @if($roles) 
            @foreach($roles as $item)
            <option value="{{$item['id']}}">{{$item['name']}}</option>
            @endforeach 
            @endif
        </select>
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
