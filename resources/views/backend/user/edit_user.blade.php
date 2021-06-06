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
			  <h4 class="box-title">Modification utilisateurs</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('user.update',$userData->id)}}">
						@csrf
					  <div class="row">
						<div class="col-12">						
							 
		
							 <div class="row">
							<div class="col-md-6">
								 <div class="form-group">
								<h5>Rôle <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="usertype" id="select" required class="form-control">
										
										<option value="Admin" {{($userData->usertype == "Admin" ? "selected": " ")}}>Admin</option>
										<option value="User" {{($userData->usertype == "User" ? "selected": " ")}}>User</option>
										
										
										 
									</select>
								</div>
							</div>
							<div class="form-group">
								<h5>E-mail <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="email" class="form-control" value="{{$userData->email}}" required data-validation-required-message="Ce champ est obligatoire">
									 </div>
							</div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
								<h5>Nom complet <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="name" class="form-control" value="{{$userData->name}}" required data-validation-required-message="Ce champ est obligatoire"> </div>
							</div> 
							<div class="form-group">
								<h5>Mot de pass <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="password" name="password" class="form-control" required data-validation-required-message="Ce champ est obligatoire"> 
								</div>
							</div>
							</div>
						</div>
							 
							 
							 
						</div>
						 
					  </div>
						
						 
						 
						<div class="text-xs-right">
							
							<input type="reset" class="btn btn-rounded btn-danger mb-" value="Annuler">
							<input type="submit" class="btn btn-rounded btn-info mb-" value="Mise à jour">
							
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