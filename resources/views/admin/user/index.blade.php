@extends('layouts.admin') @section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">Responsive Table</h1>
        <p class="description">An example of responsive table with fixed header</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
            </li>
            <li>
                <a href="tables-basic.html">Tables</a>
            </li>
            <li class="active">
                <strong>Responsive Table</strong>
            </li>
        </ol>
    </div>
</div>

<!-- Responsive Table -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Adjustable Responsive Table</h3>
                <div class="panel-options">
                    <a href="#">
                        <i class="linecons-cog"></i>
                    </a>
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>
                    <a href="#" data-toggle="reload">
                        <i class="fa-rotate-right"></i>
                    </a>
                    <a href="#" data-toggle="remove">
                        &times;
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th data-priority="1">姓名</th>
                                <th data-priority="3">邮箱</th>
                                <th data-priority="1">创建时间</th>
                                <th data-priority="3">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>597.74</td>
                                <td>12:12PM</td>
                                <td>14.81 (2.54%)</td>
                                <td>582.93</td>
                                <td>597.95</td>
                            </tr> -->
                            @if($users) 
                            @foreach($users as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>{{$item['created_at']}}</td>
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
                </div>
                <script type="text/javascript">
                // This JavaScript Will Replace Checkboxes in dropdown toggles
                jQuery(document).ready(function($) {
                    setTimeout(function() {
                        $(".checkbox-row input").addClass('cbr');
                        cbr_replace();
                    }, 0);
                });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- Imported scripts on this page -->
<script src="{{asset('backend/js/rwd-table/js/rwd-table.min.js')}}"></script>

<!-- JavaScripts initializations and stuff -->
<script src="{{asset('backend/js/xenon-custom.js')}}"></script>
@endsection
