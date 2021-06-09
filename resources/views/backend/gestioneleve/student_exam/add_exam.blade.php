@extends('admin.admin_master')
@section('admin')
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Ajouter un examen</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('exam.store')}}">
						@csrf
					  
						<div class="col-12">						
							 
		
							 <div class="row">
							 	<div class="col-md-5">
							 		<div class="form-group">
								<h5>Examen<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="name" class="form-control">
								@error('name')
								<span class="text-danger">{{$message}}</span>

								@enderror
									 </div>
							</div>
							 	</div>
							 	<div class="col-md-5">
							 		 <br>
							 		 
							<input type="submit" class="btn btn-rounded btn-info mb-" value="Enregistrer">
					
							<input type="reset" class="btn btn-rounded btn-danger mb-" value="Annuler">
							
							 	</div>

							
						</div>
							 
							 
							 
						</div>
						 
					  
						
						 
						 
						
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  
@endsection