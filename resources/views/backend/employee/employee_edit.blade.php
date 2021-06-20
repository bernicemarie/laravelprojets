@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edition d'un employé</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('update.employee.registration',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 	
 		<div class="row"> <!-- 1st Row -->
 			
 			<div class="col-md-4">

 		 <div class="form-group">
		<h5>Nom  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $editData->name }}"  required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-4">

 		 <div class="form-group">
		<h5>Père<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="fname" class="form-control" value="{{ $editData->fname }}"  required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 -->



	<div class="col-md-4">

 		 <div class="form-group">
		<h5>Mère<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="mname" class="form-control" value="{{ $editData->mname }}"  required=""> 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 1stRow -->






	<div class="row"> <!-- 2nd Row -->
 			
 			<div class="col-md-4">

 		 <div class="form-group">
		<h5>Téléphone <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="telephone" class="form-control" value="{{ $editData->telephone }}"  required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-4">

 		 <div class="form-group">
		<h5>Adresse <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="adresse" class="form-control" value="{{ $editData->adresse }}"  required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 -->



	<div class="col-md-4">

 		 <div class="form-group">
		<h5>Sexe<span class="text-danger">*</span></h5>
		<div class="controls">
	 <select name="sexe" id="gender" required="" class="form-control">
			<option value="" selected="" disabled="">Selectionner</option>
			<option value="Homme" {{ ($editData->sexe == 'Homme')? 'selected': '' }}>Homme</option>
			<option value="Femme" {{ ($editData->sexe == 'Femme')? 'selected': '' }}>Femme</option>
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 2nd Row -->



<div class="row"> <!-- 3rd Row -->

@if(!@editData)
<div class="col-md-4">

 		  <div class="form-group">
		<h5>Salaire<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="salary" class="form-control" value="{{ $editData->salary }}" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 
@endif


 			
 			<div class="col-md-4">

 		 <div class="form-group">
		<h5>Date de naissance<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="dob" class="form-control" value="{{ $editData->dob }}" required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-4">

 		  <div class="form-group">
		<h5>Designation <span class="text-danger">*</span></h5>
		<div class="controls">
	 <select name="designation_id" required="" class="form-control">
			<option value="" selected="" disabled="">Select Year</option>
			 @foreach($designation as $desi)
 <option value="{{ $desi->id }}" {{ ($editData->designation_id == $desi->id)?'selected':'' }} >{{ $desi->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 3rd Row -->

<div class="row"> <!-- 4TH Row -->
	@if(!@editData)
 		<div class="col-md-3">

 		<div class="form-group">
		<h5>Date d'embauche <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="join_date" class="form-control" value="{{ $editData->join_date }}" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 
@endif

           <div class="col-md-3">

<div class="form-group">
		<h5>Profile Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" id="image" >  </div>
	 </div>
 		 
	  
 			</div> <!-- End Col md 3 --> 


 			<div class="col-md-3">

 		 <div class="form-group">
		<div class="controls">
		<img id="showImage" src="{{ (!empty($editData->image))? url('upload_image/employee_images/'.$editData->image):url('upload_image/bernice.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 


	 </div>
	 </div>
	  
 			</div> <!-- End Col md 3 --> 
 			<div class="col-md-3">

 		 <div class="form-group">
						<div class="text-xs-right" style="padding-top:25px">
	 <input type="submit" class="btn  btn-primary mb-5" value="Modifier">
	 <input type="reset" class="btn  btn-danger mb-5" value="Annuler">
						</div>
						</div>
						</div>
 			
 		</div> <!-- End 4TH Row -->

 
					
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


 
 
	  
	  </div>
  </div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>



@endsection
