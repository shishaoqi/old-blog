<form class="form-horizontal" role="form" method="POST" action="{{url('admin/role')}}">
    <div style="margin-top: 20px;"></div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="cove_image"/>
    @include('admin.role._form')
</form>
