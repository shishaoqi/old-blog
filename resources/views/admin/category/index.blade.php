@extends('layouts.admin') @section('content')
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
        <a href="{{url('admin/category/create')}}" class="btn btn-default">新增</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Simple nesting example</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <ul id="nestable-list-1" class="uk-nestable" data-uk-nestable>
                    @if($cateList) @foreach($cateList as $item)
                    <li data-item="Item {{$item['id']}}" data-item-id="a">
                        <div class="uk-nestable-item">
                            <div class="uk-nestable-handle"></div>
                            <div data-nestable-action="toggle"></div>
                            <div class="list-label"><a href="{{url('admin/category/create'.'?pid='.$item['id'])}}">{{$item['name']}}</a></div>
                            <div class="pull-right action-buttons">
                                <a class="btn-xs tooltips editCate" data-placement="top" data-original-title="修改" href="{{url('admin/category/'.$item['id'].'/edit')}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                @if(!isset($item['_child']))
                                <a class="btn-xs tooltips" onclick="showAjaxModal({{$item['id']}}, $(this));" data-placement="top" data-original-title="删除" data-id="3" href="javascript:;">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        @if(isset($item['_child']))
                        <ul>
                            @foreach($item['_child'] as $v)
                            <li data-item="Item {{$item['id']}}-{{$v['id']}}" data-item-id="g" id="category-id-{{$item['id']}}-{{$v['id']}}">
                                <div class="uk-nestable-item">
                                    <div class="uk-nestable-handle"></div>
                                    <div data-nestable-action="toggle"></div>
                                    <div class="list-label"><a href="{{url('admin/category/create'.'?pid='.$v['id'])}}">{{$v['name']}}</a></div>
                                    <div class="pull-right action-buttons">
                                        <a class="btn-xs tooltips editCate" data-placement="top" data-original-title="修改" href="{{url('admin/category/'.$v['id'].'/edit')}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if(!isset($v['_child']))
                                        <a class="btn-xs tooltips" onclick="showAjaxModal({{$v['id']}}, $(this));" data-placement="top" data-original-title="删除" data-id="3" href="javascript:;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                @if(isset($v['_child']))
                                <ul>
                                    @foreach($v['_child'] as $vo)
                                    <li data-item="Item {{$item['id']}}-{{$v['id']}}-{{$vo['id']}}" data-item-id="h" id="category-id-{{$item['id']}}-{{$v['id']}}-{{$vo['id']}}">
                                        <div class="uk-nestable-item">
                                            <div class="uk-nestable-handle"></div>
                                            <div data-nestable-action="toggle"></div>
                                            <div class="list-label">{{$vo['name']}}</div>
                                            <div class="pull-right action-buttons">
                                                <a class="btn-xs tooltips editCate" data-placement="top" data-original-title="修改" href="{{url('admin/category/'.$vo['id'].'/edit')}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn-xs tooltips" onclick="showAjaxModal({{$vo['id']}}, $(this));" data-placement="top" data-original-title="删除" data-id="3" href="javascript:;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach @endif
                </ul>
            </div>
            <div class="col-sm-4">
                <textarea id="nestable-list-1-ev" class="form-control" rows="17" placeholder="Nestable Events"></textarea>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showAjaxModal(id, currentObj) {
        var title = '提示';
        var response = "确定删除此分类"
        //alert(currentObj.html());

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
                        //alert(data.msg);
                        $('#modal-7').modal('hide');
                        currentObj.parent().parent().parent().remove();
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
