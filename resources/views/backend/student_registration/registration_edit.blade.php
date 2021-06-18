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
			  <h4 class="box-title">Ajouter un élève</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('registration.store')}}" enctype="multipart/form-data">
						@csrf
					  
						<div class="col-12">						
							 
		
							 <div class="row">
							<div class="col-md-3">
								  <div class="form-group">
		<h5>Nom Elève <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input  type="text" name="name" class="form-control" required="" value="{{$editData['registration_relation_user']['name']}}" > 
	  </div>		 
	  </div>
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
		<h5>Père <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input value="{{$editData['registration_relation_user']['fname']}}" type="text" name="fname" class="form-control" required="" > 
	  </div>		 
	  </div>
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
		<h5>Mère <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input value="{{$editData['registration_relation_user']['mname']}}" type="text" name="mname" class="form-control" required=""> 
	  </div>		 
	  </div>
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
		<h5>Téléphone<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="telephone" class="form-control" required="" value="{{$editData['registration_relation_user']['telephone']}}"> 
	  </div>		 
	  </div>  
								  
						     </div> 
						 </div>
							 <div class="row">
							<div class="col-md-3">
								 <div class="form-group">
								<h5>Sexe<span class="text-danger">*</span></h5>
								<div class="controls">
									 <select name="sexe" id="gender" required="" class="form-control">
			<option value="" selected="" disabled="">Selectionner un sexe</option>
			<option value="Homme" {{($editData['registration_relation_user']['sexe'] === 'Homme')? 'selected': ''}}>Homme</option>

			<option value="Femme" {{($editData['registration_relation_user']['sexe'] == 'Femme')? 'selected': ''}}>Femme</option>
			 
			 
		</select>
								</div>
							    </div> 
						     </div>
						     <div class="col-md-3">
								<div class="form-group">
		<h5>Date de naissance<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="dob" class="form-control" required="" value="{{$editData['registration_relation_user']['dob']}}" > 
	  </div>		 
	  </div>
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
		<h5>Discount <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="discount" class="form-control" required="" value="{{$editData['registration_relation_discount']['discount']}}"> 
	  </div>		 
	  </div>
						     </div>
						     <div class="col-md-3">
								  <div class="form-group">
		<h5>Adresse <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="adresse" class="form-control" required="" value="{{$editData['registration_relation_user']['adresse']}}"> 
	  </div>		 
	  </div>
						     </div> 
						 </div>		 <div class="row">
							<div class="col-md-3">
								 <div class="form-group">
								<h5>Shift<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="shift_id" id="select" required class="form-control">
										<option value="">Selectionner un shift</option>
										 @foreach($shifts as $key=> $value)
										<option  value="{{$value->id}}" {{($editData->shift_id==$value->id? "selected":" ")}}>{{$value->name}}</option>
										 @endforeach
									</select>
								</div>
							    </div> 
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
								<h5>Classe<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="class_id" id="select" required class="form-control">
										<option value="">Selectionner un rôle</option>
										 @foreach($classes as $key=> $classe)
										<option  value="{{$classe->id}}" {{($editData->class_id==$classe->id? "selected":" ")}}>{{$classe->name}}</option>
										 @endforeach
										 
										 
									</select>
								</div>
							    </div> 
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
								<h5>Year<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="year_id" id="select" required class="form-control">
										<option value="">Selectionner une année</option>
										 @foreach($years as $key=> $value)
										<option  value="{{$value->id}}" {{($editData->year_id==$value->id? "selected":" ")}}>{{$value->name}}</option>
										 @endforeach
										 
									</select>
								</div>
							    </div> 
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
								<h5>Groupe<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="groupe_id" id="select" required class="form-control">
										<option value="">Selectionner un groupe</option>
										 @foreach($groups as $key=> $value)
										<option  value="{{$value->id}}" {{($editData->groupe_id==$value->id? "selected":" ")}}>{{$value->name}}</option>
										 @endforeach
										 
									</select>
								</div>
							    </div> 
						     </div> 
						 </div>
						    
						     <div class="row">
						     	 
						     <div class="col-md-3">
								 <div class="form-group">
		<h5>Profile Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" id="image"  value="{{$editData['registration_relation_user']['image']}}" >  </div>
	 </div>
						     </div>
						      <div class="col-md-3">
							<div class="form-group">
		<div class="controls">
	<img id="showImage" src="{{(!empty($editData['registration_relation_user']['image']))? url('upload_image/student_image/'.$editData['registration_relation_user']['image']):url('upload_image/bernice.jpg')}}" alt="Image Utilisateur" style="width:100px;height:100px"; border:1px solid#00000; style="width: 100px; height: 100px; border: 1px solid #000000;"> 

	 </div>
	 </div>
							
							</div>
							

							<div class="col-md-3">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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