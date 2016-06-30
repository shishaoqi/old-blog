@extends('layouts.admin') @section('content')
<!-- Removing search and results count filter -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Removing search and results count filter</h3>
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
        <table class="table table-bordered table-striped" id="example-2">
            <thead>
                <tr>
                    <th class="no-sorting">
                        <input type="checkbox" class="cbr">
                    </th>
                    <th>Student Name</th>
                    <th>Average Grade</th>
                    <th>Curriculum / Occupation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="middle-align">
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Randy S. Smith</td>
                    <td>8.7</td>
                    <td>Social and human service</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Ellen C. Jones</td>
                    <td>7.2</td>
                    <td>Education and development manager</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Carl D. Kaya</td>
                    <td>9.5</td>
                    <td>Express Merchant Service</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Jennifer J. Jefferson</td>
                    <td>10</td>
                    <td>Maxillofacial surgeon</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                    <td>6.8</td>
                    <td>Set and exhibit designer</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Lillian J. Earl</td>
                    <td>7.6</td>
                    <td>Social and human service assistant</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Ellen C. Jones</td>
                    <td>7.2</td>
                    <td>Education and development manager</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Randy S. Smith</td>
                    <td>8.7</td>
                    <td>Social and human service</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>Jennifer J. Jefferson</td>
                    <td>10</td>
                    <td>Maxillofacial surgeon</td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>
                        <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                            Profile
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
