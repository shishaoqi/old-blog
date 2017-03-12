<form class="form-horizontal" role="form" method="POST" action="{{url('admin/permission')}}">
    <div style="margin-top: 20px;"></div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="cove_image"/>
    @include('admin.permission._form')
    <!-- <div class="form-group">
        <div class="col-md-4 col-md-offset-3">
            <button type="submit" class="btn btn-primary btn-md">
                <i class="fa fa-plus-circle"></i>
                添加
            </button>
        </div>
    </div> -->
</form>