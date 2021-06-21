@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employé Sortant</h3>
	<a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter un employé sortant</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Nom</th>
				<th>ID No </th>
				<th>Object</th>
				<th>Date Debut</th>
				<th>Date Fin </th> 
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $leave )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $leave['relation_user']['name'] }}</td>
				<td> {{ $leave['relation_user']['id_no'] }}</td>
				<td> {{ $leave['relation_purpose']['name'] }}</td>
				<td> {{ $leave->start_date }}</td>
				<td> {{ $leave->end_date }}</td> 

				<td>
<a href="{{ route('employee.leave.edit',$leave->id) }}" class="btn btn-primary" id="edit"><i class="fa fa-edit"></i></a>
<a href="{{ route('employee.leave.delete',$leave->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash-o"></i></a>

				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
