@extends('layouts.admin') @section('content')
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
                <form role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-1">Input text field</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-1" placeholder="Placeholder">
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-2">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="field-2" placeholder="Placeholder (Password)">
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Disabled input</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Placeholder" disabled>
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-3">Email field</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="field-3" placeholder="Enter your email&hellip;">
                            <p class="help-block">Example block-level help text here. Emails inputs are validated on native HTML5 forms.</p>
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-4">File Field</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="field-4">
                        </div>
                    </div>
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-5">Text area</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="5" id="field-5"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
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
                    </div>
                    
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <!-- <label class="col-sm-2 control-label">Select list</label> -->
                        <div class="col-sm-12">
                            <div id="test-editormd">
                                <textarea style="display:none;"></textarea>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{asset('backend/js/editormd/css/editormd.css')}}" />
<script src="{{asset('backend/js/editormd/editormd.js')}}"></script>
<script type="text/javascript">
    var testEditor;

    $(function() {
        testEditor = editormd("test-editormd", {
            width   : "90%",
            height  : 640,
            syncScrolling : "single",
            path    : "{{asset('backend/js/editormd/lib')}}"+'/'
        });
        
        /*
        // or
        testEditor = editormd({
            id      : "test-editormd",
            width   : "90%",
            height  : 640,
            path    : "../lib/"
        });
        */
    });
</script>
@endsection
