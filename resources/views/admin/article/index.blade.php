@extends('admin.layouts.admin')

@section('content')
<!-- Removing search and results count filter -->
<div class="panel panel-default">
    <div class="panel-heading">

        <h3 class="panel-title">文章列表</h3>
        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <a href="{{url('admin/article/create')}}">新增</a>
            </a>
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
        @include('admin.partials.errors')
        @include('admin.partials.success')
        <table class="table table-bordered table-striped" id="example-2">
            <thead>
                <tr>
                    <th class="no-sorting">
                        <input type="checkbox" class="cbr">
                    </th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody class="middle-align">
                @if($posts) 
                @foreach($posts as $item)
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['cate_id']}}</td>
                    <td>{{$item['published_at']}}</td>
                    <td>
                        <a href="{{url('admin/article/'.$item["id"].'/edit')}}" class="btn btn-secondary btn-sm btn-icon icon-left">
                            编辑
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-sm btn-icon icon-left" onclick="showAjaxDeleteModal({{$item['id']}}, $(this));">
                            删除
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                @endforeach 
                @endif
            </tbody>
        </table>
        {!! $posts->links() !!}
    </div>
</div>
@stop

@section('js')
<script>
     function showAjaxDeleteModal(id, curObj) {
        var title = '提示';
        var response = "确定删除此博文"

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
                url: "{{url('admin/article')}}/" + id,
                data: {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}",
                },
                success: function(data) {
                    if (data.status == 1) {
                        curObj.parent().parent().remove();
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
</script>
@stop
