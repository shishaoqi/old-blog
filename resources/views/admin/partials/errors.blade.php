@if (Session::has('errors'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> Errors. 
        </strong>
        {{ Session::get('errors') }}
    </div>
@endif