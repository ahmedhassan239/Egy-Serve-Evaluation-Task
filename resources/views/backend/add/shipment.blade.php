@extends('backend.layouts.master')
@section('content_title')

<h1 style="font-family: 'Source Sans Pro',sans-serif;margin-left: 4%;">Add New Shipment</h1>
@endsection
@section('breadcrumb') 
<li>Shipments</li>
<li class="active">Add New Shipment</li>
@endsection
@section('content')
	<br><br>
<div class="container-fluid container-fullw" style="width: 95%;">
	<div class="row">
		
		<div class="col-md-12">
			<form role="form" method="post" action="/sitebackend/shipment">
				@csrf
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
					</ul>
				</div>
				@endif
			
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Add New Shipment</h3>
							<div class="box-tools pull-right">
							    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Name:</label>
									</div>
									<div class="col-md-6 ">
										<div class="input-group date">
										  <div class="input-group-addon">
										    <i class="	fa fa-pencil-square-o"></i>
										  </div>
										  <input type="text" class="form-control pull-right input-lg"  name="name"  placeholder="Name" required>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Description</label>
									</div>
									<div class="col-md-6">
										<div class="input-group date">
										  <div class="input-group-addon">
										    <i class="	fa fa-pencil-square-o"></i>
										  </div>
										  <textarea class=" form-control" cols="3" rows="3" placeholder="Description" name="description" required="required"></textarea>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Status</label>
									</div>
									<div class="col-md-6">
										<div class="input-group date">
											  <div class="input-group-addon">
											    <i class="fa fa-folder"></i>
											  </div>
											 <select name="status" class="form-control pull-right input-lg" required>
											 	<option>................</option>
											 	<option value="1">Paid</option>
											 	<option value="2">Unpaied</option>
											  </select>
										</div>
									</div>
								</div>
								
							</div>
							
							
								<input type="submit" name="Save" class="btn btn-primary btn-lg pull-right " style="margin-right: 30px; margin-top: 5px;">
						</div>
					</div>
			</form>
		</div>
	
	</div>
</div>
<!-- Input addon -->

          <!-- /.box -->


       

@endsection