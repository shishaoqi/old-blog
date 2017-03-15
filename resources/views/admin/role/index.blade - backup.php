@extends('layouts.admin') 

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
        <div class="col-md-6 text-right">
            <a href="#" class="btn btn-success btn-md"><i class="fa fa-plus-circle"></i> 添加角色 </a>
        </div>
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
                    <th>角色</th>
                    <th>角色名称</th>
                    <th>角色概述</th>
                    <th>角色创建日期</th>
                    <th>角色修改日期</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </thead>
        
            <tfoot>
                <tr>
                    <th data-sortable="false"></th>
                    <th>角色</th>
                    <th>角色名称</th>
                    <th>角色概述</th>
                    <th>角色创建日期</th>
                    <th>角色修改日期</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </tfoot>
        
            <tbody>
            </tbody>
        </table>
        
    </div>
</div>

<script>

    loadShow = function(){
        $("#loading").show();
    }
    loadFadeOut=function(){
        $("#loading").fadeOut(500);
    }


    jQuery(document).ready(function($) {
        /*$("#example-1").dataTable({
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });*/

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
            order: [[1, "asc"]],
            serverSide: true,
            ajax: {
                    url: "{{url('admin/role/index')}}",
                    type: 'POST',

                    data: function (d) {
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
                        var row_edit = {{Gate::forUser(auth('admin')->user())->check('admin.role.edit') ? 1 : 0}};
                        var row_delete = {{Gate::forUser(auth('admin')->user())->check('admin.role.destroy') ? 1 :0}};
                        var str = '';

                        //下级菜单
                        /*if (cid == 0) {
                            str += '<a style="margin:3px;"  href="{{url('admin/role')}}/' + row['id'] + '" class="X-Small btn-xs text-success "><i class="fa fa-adn"></i>下级菜单</a>';
                        }
*/
                        //编辑
                        if (row_edit) {
                            str += '<a style="margin:3px;" href="{{url('admin/role')}}/' + row['id'] + '/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>';
                        }

                        //删除
                        if (row_delete) {
                            str += '<a style="margin:3px;" href="#" attr="' + row['id'] + '" class="delBtn X-Small btn-xs text-danger"><i class="fa fa-times-circle"></i> 删除</a>';
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

        $("table").delegate('.delBtn', 'click', function () {
            var id = $(this).attr('attr');
            $('.deleteForm').attr('action', "{{url('admin/role')}}/" + id);
            $("#modal-delete").modal();
        });
    });
</script>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{asset('backend/js/datatables/dataTables.bootstrap.css')}}">

<!-- Imported scripts on this page -->
<script src="{{asset('backend/js/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('backend/js/datatables/yadcf/jquery.dataTables.yadcf.js')}}"></script>
<script src="{{asset('backend/js/datatables/tabletools/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/layer/layer.js')}}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{asset('backend/js/xenon-custom.js')}}"></script>
<script src="{{asset('backend/js/core.js')}}"></script>
@endsection
