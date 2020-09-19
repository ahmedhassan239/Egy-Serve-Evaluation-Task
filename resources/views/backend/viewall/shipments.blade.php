@extends('backend.layouts.master')
@section('header')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content_title')
All Shipments   
@if (Auth::user()->type == 1)
<h3 style="color: red;">    Note : Your Privilege is Company Priv </h3>
@else
  <h3 style="color: red;">Note : Your Privilege is Coustomer Priv</h3>
@endif
@endsection
@section('breadcrumb')
<li class="active">All Shipments</li>
@endsection
@section('content')
<div class="wrap-content container" id="container">
    
    <!-- start: DYNAMIC TABLE -->
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                @if (Auth::user()->type == 1)
                <h5 class="over-title margin-bottom-15">
                <a href="/sitebackend/shipment/create" style="background-color: #3498DB;padding: 10px;border-radius: 8px;color: #fff;font-weight: 700;">Add Shipment</a>
                </h5>
                @endif  
                
                <br>
                @if(Session::has('msg'))
                <?php
                $msg = array();
                $msg = session()->pull('msg');
                echo'
                <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            ' . $msg[1] . '!
                </div>
                ';
                ?>
                @endif
                @if(count($errors) >0)
                
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                        @endforeach
                        <ul>
                        </ul>
                    </div>
                    @endif
                    <div class="box box-primary">
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Code</th>
                                        <th>Created at</th>
                                        @if (Auth::user()->type == 1)
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shipments as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            @if ($row->status == 1)
                                                Paid
                                            @else
                                            UnPaid
                                            @endif
                                        </td>
                                        <td>{{ $row->code }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        @if (Auth::user()->type == 1)
                                        <td><a href="/sitebackend/shipment/{{ $row->id }}/edit" class="btn btn-success" data-toggle="modal" data-target="#{{ $row->id }}">Edit</a></td>
                                        <td><a href="/sitebackend/shipment/{{ $row->id }}/delete" class="btn btn-danger">Delete</a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Code</th>
                                    <th>Created at</th>
                                    @if (Auth::user()->type == 1)
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
   @include('backend.edit.shipment')

@endsection

@section('script')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
   
  })
</script>
@endsection

