@extends('layouts.admin') @section('content')
<style>
    .uk-nestable-item{
        width:220px;
        float:left;
        margin-right:24px;
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
        <a href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="btn btn-info"><i class="fa fa-plus"></i> 新增</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Simple nesting example</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <ul id="nestable-list-1" class="uk-nestable" data-uk-nestable>
                    
                    <li data-item="Item" data-item-id="a">
                        <div class="uk-nestable-item">
                            <!-- <div class="fa fa-tags"></div> -->
                            <i class="fa fa-tags"></i>
                            <div data-nestable-action="toggle"></div>
                            <div class="list-label">aaaabbb</div>
                            <div class="pull-right action-buttons">
                                <a class="btn-xs tooltips editCate" data-placement="top" data-original-title="修改" href="{{url('admin/category/edit')}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                
                                <a class="btn-xs tooltips" onclick="showAjaxModal({{111}});" data-placement="top" data-original-title="删除" data-id="3" href="javascript:;">
                                    <i class="fa fa-trash"></i>
                                </a>
                               
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function showAjaxModal(id) {
        var title = '提示';
        var response = "确定删除此分类"

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
                url: "{{url('admin/category')}}/" + id,
                data: {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                },
                success: function(data) {
                    if (data.status == 1) {
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                },
                error: function(msg) {
                    alert('error2');
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
