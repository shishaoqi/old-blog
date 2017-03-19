<form class="form-horizontal" role="form" method="POST" action="{{url('admin/user')}}">
    <div style="margin-top: 20px;"></div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('admin.user._form')
</form>
