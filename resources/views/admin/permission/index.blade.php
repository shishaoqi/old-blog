@extends('admin.layouts.admin') 

@section('content')
<div class="page-title">
                
    <div class="title-env">
        <!-- <h1 class="title">DataTable</h1>
        <p class="description">Dynamic table variants with pagination and other controls</p> -->
        <ol class="breadcrumb bc-1">
            <li>
                <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
            </li>
            <li>
                <a href="tables-basic.html">Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <a href="{{url('admin/permission/'.$cid.'/create')}}" class="btn btn-success btn-md" target="dialog"  width="400px"><i class="fa fa-plus-circle"></i> 添加权限 </a>
            @if($cid==0)
            <span style="margin:3px;" id="cid" attr="{{$cid}}" class="btn-flat text-info"> 顶级菜单</span>
            @else
            <span style="margin:3px;" id="cid" attr="{{$cid}}" class="text-info"> {{$data->display_name}} </span>
            <a style="margin:3px;" href="{{url('admin/permission')}}"
               class="btn btn-warning btn-md animation-shake reloadBtn"><i class="fa fa-mail-reply-all"></i> 返回顶级菜单
            </a>
            @endif
        </ol>
    </div>
        
</div>

<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Basic Setup</h3>
        
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
        
        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th data-sortable="false"></th>
                    <th>权限规则</th>
                    <th>权限名称</th>
                    <th>权限概述</th>
                    <th>权限创建日期</th>
                    <th>权限修改日期</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </thead>
        
            <tfoot>
                <tr>
                    <th data-sortable="false"></th>
                    <th>权限规则</th>
                    <th>权限名称</th>
                    <th>权限概述</th>
                    <th>权限创建日期</th>
                    <th>权限修改日期</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </tfoot>
        
            <tbody>
            </tbody>
        </table>
        
    </div>
</div>
@stop

@section('css')
<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{asset('backend/js/datatables/dataTables.bootstrap.css')}}">
@stop

@section('js')
<script>
    loadShow = function(){
        $("#loading").show();
    }
    loadFadeOut=function(){
        $("#loading").fadeOut(500);
    }


    jQuery(document).ready(function($) {
        var csrf_token = "{{csrf_token()}}";
        /*$("#example-1").dataTable({
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });*/

        var cid = $('#cid').attr('attr');
        var table = $('#example-1').DataTable({
            language: {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                },
            order: [[5, "asc"]],
            serverSide: true,
            ajax: {
                    url: "{{url('admin/permission/index')}}",
                    type: 'POST',

                    data: function (d) {
                        d.cid = cid;
                        d._token = "{{csrf_token()}}";
                    },
                },

            "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "display_name"},
                    {"data": "description"},
                    {"data": "created_at"},
                    {"data": "updated_at"},
                    {"data": "action"}
                ],

            columnDefs: [
                {
                    'targets': -1, "render": function (data, type, row) {
                        var row_edit = true;//{{Gate::forUser(auth('admin')->user())->check('admin.permission.edit') ? 1 : 0}};
                        var row_delete = true;//{{Gate::forUser(auth('admin')->user())->check('admin.permission.destroy') ? 1 :0}};
                        var str = '';

                        //下级菜单
                        //if (cid == 0) {
                            str += '<a style="margin:3px;"  href="{{url('admin/permission')}}/' + row['id'] + '" class="X-Small btn-xs text-success"><i class="fa fa-adn"></i>下级菜单</a>';
                        //}

                        //编辑
                        if (row_edit) {
                            str += '<a style="margin:3px;" href="javascript:;"  url="{{url('admin/permission')}}/' + row['id'] + '/edit" class="X-Small btn-xs text-success" onClick="dialog($(this))" width="400px"><i class="fa fa-edit"></i> 编辑</a>';
                        }

        //删除
        if (row_delete) {
            str += '<a style="margin:3px;" href="javascript:;" data-url="{{url('admin/permission')}}/' + row['id'] + '" csrf_token="' + csrf_token + '" class="delBtn X-Small btn-xs text-danger" onClick="deleteAlert($(this))" title="确定要删除此权限？"><i class="fa fa-times-circle"></i> 删除</a>';
        }

        return str;
    }
    }
    ],
    });

        table.on('preXhr.dt', function () {
            loadShow();
        });

        table.on('draw.dt', function () {
            loadFadeOut();
        });

        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        /*$("table").delegate('.delBtn', 'click', function () {
            var id = $(this).attr('attr');
            $('.deleteForm').attr('action', '/admin/permission/' + id);
            $("#modal-delete").modal();
        });*/

        /*$('#example-1 tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            alert( 'You clicked on '+data[0]+'\'s row' );
        } );*/
        
        initUI(csrf_token);
    });
</script>
<!-- Imported scripts on this page -->
<script src="{{asset('backend/js/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('backend/js/datatables/yadcf/jquery.dataTables.yadcf.js')}}"></script>
<script src="{{asset('backend/js/datatables/tabletools/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/layer/layer.js')}}"></script>

<script src="{{asset('backend/js/core.js')}}"></script>
@stop
