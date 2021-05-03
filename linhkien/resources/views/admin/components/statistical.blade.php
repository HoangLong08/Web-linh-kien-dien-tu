@extends('admin.masterAdmin')
@section('content')
<div class="content-main">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View And Edit Statistical
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h3 class="panel-title">
                       <i class="fa fa-tags"></i>  View Statistical
                   </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> ID_FACULTY </th>
                                    <th> FACULTY </th>
                                    <th> IMAGE 1 </th>
                                    <th> IMAGE 2 </th>
                                    <th> IMAGE 3 </th>
                                    <th> DELETE </th>
                                    <th> EDIT </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td> id </td>
                                <td> ds </td>
                                    <td> as </td>
                                    <td> id </td>
                                <td> ds </td>
                                    <td> as </td>
                                   <td> 
                                         <a href="#">
                                            <i class="fa fa-trash-o"></i> Delete
                                         </a> 
                                    </td>
                                    <td> 
                                         <a href="#">
                                            <i class="fa fa-pencil"></i> Edit
                                         </a> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection