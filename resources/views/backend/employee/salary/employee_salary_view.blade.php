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
				  <h3 class="box-title">Liste des employés salariés</h3>
	<a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter un employé</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Nom</th> 
				<th>ID NO</th>
				<th>Téléphone</th>
				<th>Sexe</th>
				<th>Date d'embauche</th>
				<th>Salaire</th>
				 
				<th width="20%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value->name }}</td>	
				<td> {{ $value->id_no }}</td>	
				<td> {{ $value->telephone }}</td>	
				<td> {{ $value->sexe }}</td>	
				<td> {{ date('Y-m-d',strtotime($value->join_date))}}</td>	
				<td> {{ $value->salary }}</td>
				 		 
				<td>
<a title="Increment" href="{{ route('employee.salary.increment',$value->id) }}" class="btn btn-info"> <i class="fa fa-plus-circle"></i></a>
<a  href="{{ route('employee.registration.details',$value->id) }}" class="btn btn-primary"><i class="fa fa-check"></i></a>
<a title="Details"  href="{{ route('employee.salary.details',$value->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
<a title="Suppression" id="delete" href="{{ route('employee.salary.delete',$value->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>

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
