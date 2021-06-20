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
			  <h4 class="box-title">Promouvoir un élève</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('registration.updatepromotion',$editData->student_id)}}" enctype="multipart/form-data">
						@csrf
					  <input type="hidden" name="id" value="{{ $editData->id }}">
						<div class="col-12">						
							 
		
							 
							 <div class="row">
							 
						      
						     
						      
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
		<h5>Discount <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="discount" class="form-control" required="" value="{{$editData['registration_relation_discount']['discount']}}"> 
	  </div>		 
	  </div>
						     </div>
						       
							

							<div class="col-md-3" style="padding-top:25px">
							 		 
							 		 
							<input type="submit" class="btn btn-rounded btn-info mb-" value="Promouvoir">
					
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