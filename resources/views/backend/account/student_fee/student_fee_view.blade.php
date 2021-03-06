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
				  <h3 class="box-title">Student Fee List </h3>
	<a href="{{ route('student.fee.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajout/Edition montant élève</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>ID No</th> 
				<th>Nom</th>
				<th>Année</th>
				<th>Classe </th>
				<th>Fee Type</th>
				<th>Amount</th>
				<th>Date</th> 
				<th>Actions</th> 
				 
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value['student']['id_no'] }}</td>	
				<td> {{ $value['student']['name'] }}</td>	
				<td> {{ $value['student_year']['name'] }}</td>	
				<td> {{ $value['student_class']['name'] }}</td>	
				<td> {{ $value['fee_category']['name'] }} </td>	
				<td> {{ $value->amount }}</td>
				<td> {{ date('M Y', strtotime($value->date))  }}</td>
				<td> <a id="delete" href="{{route('student.fee.delete',$value->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash-o"></i></a></td>
				 		  
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
