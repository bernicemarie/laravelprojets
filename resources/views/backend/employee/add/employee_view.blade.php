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
				  <h3 class="box-title">La liste des employés</h3>
	<a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter un employé</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th> 
				<th>ID NO</th> 
				<th>Nom</th> 
				
				<th>Téléphone</th>
				<th>Sexe</th>
				<th>Join Date</th>
				<th>Salaire</th>
				@if(Auth::user()->role == "Admin")
				<th>Code</th>
				
				<th width="25%">Action</th>
				  @endif
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $employee )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $employee->id_no }}</td>	
				<td> {{ $employee->name }}</td>	
				<td> {{ $employee->telephone }}</td>	
				<td> {{ $employee->sexe }}</td>	
				<td> {{ $employee->join_date }}</td>	
				<td> {{ $employee->salary }}</td>
				@if(Auth::user()->role == "Admin")	
				<td> {{ $employee->code }}</td>	
						 
				<td>
<a href="{{ route('employee.registration.edit',$employee->id) }}" id="edit" class="btn btn-info">Editer</a>
<a target="_blank" href="{{ route('employee.registration.details',$employee->id) }}" class="btn btn-primary">Details</a>
<a  href="{{ route('employee.registration.delete',$employee->id) }}" id="delete" class="btn btn-danger">Supprimer</a>

				</td>
				  @endif	
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
