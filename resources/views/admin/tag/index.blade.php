@extends('layouts.admin') @section('content')
<style>
    .uk-nestable-item{
        width:220px;
        float:left;
        margin-right:24px;
    }

    .hidden-form{
        display: none;
    }
</style>
<div class="page-title">
    <div class="title-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
            </li>
            <li>
                <a href="extra-gallery.html">Extra</a>
            </li>
            <li class="active">
                <strong>Nestable Lists</strong>
            </li>
        </ol>
    </div>
    <div class="breadcrumb-env">
        <a href="javascript:;" onclick="showAjaxAddModal();" class="btn btn-info"><i class="fa fa-plus"></i> 新增</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Simple nesting example</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <ul id="tag-table-list-id" class="uk-nestable" data-uk-nestable>
                    @if($tagList)
                    @foreach($tagList as $item)
                    <li data-item="Item" data-item-id="a">
                        <div class="uk-nestable-item">
                            <!-- <div class="fa fa-tags"></div> -->
                            <i class="fa fa-tags"></i>
                            <div data-nestable-action="toggle"></div>
                            <div class="list-label">{{$item['name']}}</div>
                            <div class="pull-right action-buttons">
                                <a class="btn-xs tooltips editCate" data-placement="top" data-original-title="修改" href="javascript:;" onclick="showAjaxEditModal($(this), {{$item['id']}});">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                
                                <a class="btn-xs tooltips" onclick="showAjaxDeleteModal($(this), {{$item['id']}});" data-placement="top" data-original-title="删除" href="javascript:;">
                                    <i class="fa fa-trash"></i>
                                </a>
                               
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @else
                    <li data-item="Item" data-item-id="a">
                        <div class="uk-nestable-item">
                            <!-- <div class="fa fa-tags"></div> -->
                            <i class="fa fa-tags"></i>
                            <div data-nestable-action="toggle"></div>
                            <div class="list-label">exampleTag</div>
                            <div class="pull-right action-buttons">
                                <a class="btn-xs tooltips editCate" data-placement="top" data-original-title="修改" href="{{url('admin/category/edit')}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                
                                <a class="btn-xs tooltips" onclick="showAjaxDeleteModal($(this), 0);" data-placement="top" data-original-title="删除" data-id="3" href="javascript:;">
                                    <i class="fa fa-trash"></i>
                                </a>
                               
                            </div>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="hidden-form" id="form-id">
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-tag" class="control-label">标签名</label>
                        <input type="text" class="form-control" name="tag" placeholder="Tag">
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group no-margin">
                        <label for="field-description" class="control-label">描述</label>
                        <textarea class="form-control autogrow" name="description" placeholder="Describetion"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    
    function showAjaxAddModal(){
        var title = '提示';
        var response = $("#form-id").html();

        $('#modal-6 .modal-title').html(title);
        $('#modal-6 .modal-body').html(response);
        $('#modal-6 .btn-white').html('取消');
        $('#modal-6 .btn-info').html('确定');//.attr('type', 'submit')
        $('#modal-6').modal('show', {
            backdrop: 'static'
        });
        //alert($('#modal-6 form input[name=tag]').val());
        

        $('#modal-6 .btn-info').on('click', function() {
            var tag  = $('#modal-6 form input[name=tag]').val();
            var description = $('#modal-6 form textarea[name=description]').val();
            //var tag_body = $('#tag-table-list-id').find('li :first').clone().appendTo('#tag-table-list-id li:last');
            //alert(tag_body);
            
            $.ajax({
                type: "POST",
                url: "{{url('admin/tag')}}",
                data: {
                    //'_method': 'store',
                    '_token': "{{csrf_token()}}",
                    'name': tag,
                    'description':description
                },
                success: function(data) {
                    if (data.status == 1) {
                        $('#modal-6').modal('hide');
                        //alert(data.msg);
                        //$('#tag-table-list-id').find('li').last().append(tag_body);
                        //$('#tag-table-list-id').find('li').last().find('.list-label').html(tag);
                        $('#tag-table-list-id').find('li :first').clone().html(tag).appendTo('#tag-table-list-id li:last');
                    } else if(data.status == -1) {
                        alert(data.msg);
                    }else{

                    }
                },
                error: function(msg) {
                    //alert('error');
                    //alert(msg.responseText);
                    //alert(msg.responseJSON.description[0]);
                    //alert(msg.responseJSON.name[0]);
                    //console.log(msg);
                    $('#modal-6 form input[name=tag]').after('<span class="validate-has-error">'+msg.responseJSON.name[0]+'</span>');
                    $('#modal-6 form textarea[name=description]').after('<span class="validate-has-error">'+msg.responseJSON.description[0]+'</span>');
                }
            })
            //$('#modal-6 form').submit();
        })
    }

    function showAjaxEditModal(curObj, id){
        var title = '修改';
        var response = $("#form-id").html();

        $('#modal-6 .modal-title').html(title);
        $('#modal-6 .modal-body').html(response);
        $('#modal-6 .btn-white').html('取消');
        $('#modal-6 .btn-info').html('确定');//.attr('type', 'submit')
        $('#modal-6').modal('show', {
            backdrop: 'static'
        });
        //alert(id);
        $.ajax({
            type: "GET",
            url: "{{url('admin/tag/')}}/"+id,// /photo/{photo}/edit
            
            success: function(data) {
                if (data.name != '') {
                    $('#modal-6 form input[name=tag]').val(data.name);
                    $('#modal-6 form textarea[name=description]').val(data.description);
                } else {
                    alert('data not request');
                    $('#modal-6').modal('hide');
                }
            },
            error: function(msg) {
                alert('error');
            }
        })

        $('#modal-6 .btn-info').on('click', function() {
            var tag  = $('#modal-6 form input[name=tag]').val();
            var description = $('#modal-6 form textarea[name=description]').val();
            
            $.ajax({
                type: "POST",
                url: "{{url('admin/tag')}}/"+id,
                data: {
                    '_method': 'put',
                    '_token': "{{csrf_token()}}",
                    'name': tag,
                    'description':description
                },
                success: function(data) {
                    if (data.status == 1) {
                        curObj.parent().parent().find('.list-label').html(tag);
                        $('#modal-6').modal('hide');
                    } else {
                        alert(data.msg);
                        $('#modal-6').modal('hide');
                    }
                },
                error: function(msg) {
                    alert('error');
                }
            })
        })
    }

    function showAjaxDeleteModal(curObj, id) {
        var title = '提示';
        var response = "确定删除此标签"

        $('#modal-7 .modal-title').html(title);
        $('#modal-7 .modal-body').html(response);
        $('#modal-7 .btn-white').html('取消');
        $('#modal-7 .btn-info').html('确定');
        $('#modal-7').modal('show', {
            backdrop: 'static'
        });

        $('#modal-7 .btn-info').on('click', function() {
            $.ajax({
                type: "POST",
                url: "{{url('admin/tag')}}/" + id,
                data: {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}",
                },
                success: function(data) {
                    if (data.status == 1) {
                        curObj.parent().parent().parent().remove();
                        $('#modal-7').modal('hide');
                    } else {
                        alert(data.msg);
                        $('#modal-7').modal('hide');
                    }
                },
                error: function(msg) {
                    alert('error');
                }
            })
        })
    }

    $(document).on('click', '.editCate', function() {
        var url = $(this).attr('data-href');
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#nestable-list-1").on('nestable-stop', function(ev) {
            var serialized = $(this).data('nestable').serialize(),
                str = '';

            //console.log( $(this).data('nestable').list() );
            str = iterateList(serialized, 0);
            //iterateList(serialized);

            $("#nestable-list-1-ev").val(str);
        });
    });

    function iterateList(items, depth) {
        var str = '';

        if (!depth)
            depth = 0;

        console.log(items);

        jQuery.each(items, function(i, obj) {
            str += '[ID: ' + obj.itemId + ']\t' + repeat('—', depth + 1) + ' ' + obj.item;
            str += '\n';

            if (obj.children) {
                str += iterateList(obj.children, depth + 1);
            }
        });

        return str;
    }

    function repeat(s, n) {
        var a = [];
        while (a.length < n) {
            a.push(s);
        }
        return a.join('');
    }
</script>
<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{asset('backend/js/uikit/uikit.css')}}">
<!-- Imported scripts on this page -->
<script src="{{asset('backend/js/uikit/js/uikit.min.js')}}"></script>
<script src="{{asset('backend/js/uikit/js/addons/nestable.min.js')}}"></script>
@endsection
