@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Modification Profile</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">						
							 
		
							 <div class="row">
							<div class="col-md-6">
								 
							<div class="form-group">
								<h5>E-mail <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="email" class="form-control" value="{{$profile->email}}" required data-validation-required-message="Ce champ est obligatoire">
									 </div>
							</div>
							<div class="form-group">
								<h5>Téléphone <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="telephone" class="form-control" value="{{$profile->telephone}}" required data-validation-required-message="Ce champ est obligatoire">
									 </div>
							</div>
							<div class="form-group">
								<h5>adresse <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="adresse" class="form-control" value="{{$profile->adresse}}" required data-validation-required-message="Ce champ est obligatoire">
									 </div>
							</div>
							
							</div>
							<div class="col-md-6">
								 <div class="form-group">
								<h5>Nom complet <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="name" class="form-control" value="{{$profile->name}}" required data-validation-required-message="Ce champ est obligatoire"> </div>
							</div> 
							 
							<div class="controls">
								<h5>Sexe <span class="text-danger">*</span></h5>
									<select name="sexe" id="select" required class="form-control">
										 
										<option value="Homme" {{($profile->sexe == "Homme" ? "selected": " ")}}>Homme</option>
										<option value="Femme" {{($profile->sexe == "Femme" ? "selected": " ")}}>Femme</option>
									</select>
								</div>
								<div class="form-group">
								<h5>Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input id="image"  type="file" name="image" class="form-control" required data-validation-required-message="Ce champ est obligatoire"> </div>
							</div>
							 <div class="form-group">
								 
								<div class="controls">
									  <img id= "showImage"class="rounded-circle" src="{{(!empty($profile->image))? url('upload_image/user_image/'.$profile->image):url('upload_image/bernice.jpg')}}" alt="Image Utilisateur" style="width:100px;height:100px"; border:1px solid#00000;>
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

  <script type="text/javascript">
  	$(document).ready(function(){
    $('#image').change(function(e){
     var reader = new FileReader();
     reader.onload=function(e){
     	$('#showImage').attr('src',e.target.result);
     }
     reader.readAsDataURL(e.target.files['0']);
    });
  	});


  </script>
  
@endsection