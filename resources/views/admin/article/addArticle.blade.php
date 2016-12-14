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

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form role="form" class="form-horizontal" action="{{url('admin/article')}}" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-1">标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-1" name="title" placeholder="标题">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    <!-- <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-2">标签</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-2" name="slug" placeholder="标签&hellip;">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tagsinput-1">Multi-select List</label>
                        
                        <div class="col-sm-10">
                            
                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#multi-select").multiSelect({
                                        afterInit: function()
                                        {
                                            // Add alternative scrollbar to list
                                            this.$selectableContainer.add(this.$selectionContainer).find('.ms-list').perfectScrollbar();
                                        },
                                        afterSelect: function()
                                        {
                                            // Update scrollbar size
                                            this.$selectableContainer.add(this.$selectionContainer).find('.ms-list').perfectScrollbar('update');
                                        }
                                    });
                                });
                            </script>
                            <select class="form-control" multiple="multiple" id="multi-select" name="slug[]">
                                @if($tags) 
                                @foreach($tags as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach 
                                @endif
                            </select>
                            
                        </div>
                    </div>

                    <!-- <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-4">File Field</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="field-4">
                        </div>
                    </div> -->

                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-5">摘要</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="5" id="field-5" name="excerpt"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">类别</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="cate_id">
                                @if($cateList) 
                                @foreach($cateList as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @if(isset($item['_child']))
                                    @foreach($item['_child'] as $v)
                                    <option value="{{$v['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;|__{{$v['name']}}</option>
                                        @if(isset($v['_child']))
                                        @foreach($v['_child'] as $vo)
                                        <option value="{{$vo['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|_____{{$vo['name']}}</option>
                                        @endforeach
                                        @endif    
                                    @endforeach
                                    @endif
                                @endforeach 
                                @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <!-- <label class="col-sm-2 control-label">Select list</label> -->
                        <div class="col-sm-12">
                            <div id="editor-md">
                                <textarea style="display:none;" name="content_mark_down"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success">提交</button>
                            <button type="reset" class="btn btn-white">重置</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{asset('backend/js/multiselect/css/multi-select.css')}}" />
<link rel="stylesheet" href="{{asset('backend/js/editormd/css/editormd.css')}}" />

<!-- Imported scripts on this page -->
<script src="{{asset('backend/js/multiselect/js/jquery.multi-select.js')}}"></script>//会与editormd.js 相冲突 

<script src="{{asset('backend/js/editormd/editormd.js')}}"></script>
<script type="text/javascript">
    var testEditor;
    var tokens = $('form input:eq(1)').val();
    
    $(function() {        
        testEditor = editormd("editor-md", {
            width   : "90%",
            height  : 640,
            syncScrolling : "single",
            path    : "{{asset('backend/js/editormd/lib')}}"+'/',
            toolbarAutoFixed: false,
            gotoLine:false,
            emoji:true,
            saveHTMLToTextarea:true,
            imageUpload : true,
            imageUploadURL : "{{url('/admin/article/uploadImg')}}",
            tokens : tokens
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
