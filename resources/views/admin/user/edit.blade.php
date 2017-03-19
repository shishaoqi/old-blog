<form class="form-horizontal" role="form" method="POST" action="{{url('admin/user/'.$id)}}">
    <div style="margin-top: 20px;"></div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{ $id }}">
    @include('admin.user._form')
</form>
