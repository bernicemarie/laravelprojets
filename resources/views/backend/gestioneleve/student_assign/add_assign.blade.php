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
			  <h4 class="box-title">Assigner des notes</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('assign.store')}}">
						@csrf
					  <div class="row">
						<div class="col-12">						
							 <div class="add_item">
							 	<div class="row">
								<div class="col-md-5">
								 <div class="form-group">
								<h5>Classe<span class="text-danger">*</span></h5>

								<div class="controls">
									<select name="class_id"  id="select" required class="form-control">
										<option value="">Selectionner une classe</option>
										 @foreach($classes as $key=> $classe)
										<option  value="{{$classe->id}}">{{$classe->name}}</option>
										 @endforeach
									</select>
									 
								</div>
							</div> 
							</div> 
							<div class="col-md-5">
									<div class="form-group">
								<h5>Matière<span class="text-danger">*</span></h5>

								<div class="controls">
									<select name="subject_id[]"  id="select" required  class="form-control">
										<option value="">Selectionner une matière</option>
										 @foreach($subject as $key=> $subjects)
										<option value="{{$subjects->id}}">{{$subjects->name}}</option>
										
										 @endforeach
									</select>
								 
								</div>
							</div>
								</div>
							</div> 
							
							<div class="row">
								<div class="col-md-3">
										<div class="form-group">
								<h5>Full Mark<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="full_mark[]" class="form-control" required>
								 
									 </div> 
									  
							</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
								<h5>Pass Mark<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="pass_mark[]" class="form-control" required>
							 
									 </div> 
									  
							</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
								<h5>Subjective Mark<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="subjective_mark[]" class="form-control" required>
								 
									 </div> 
									  
							</div>
								</div>
								<div class="col-md-2" style="padding-top: 25px;">
								<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
							</div>
							</div> 
						</div>
						</div>
						 
					  </div>
						
						 
						 
						<div class="text-xs-right">
							
							<input type="reset" class="btn btn-rounded btn-danger mb-" value="Annuler">
							<input type="submit" class="btn btn-rounded btn-info mb-" value="Enregistrer">
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
  <div style="visibility:hidden;">
  	
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
  			<div class="row">
  			<div class="col-md-2">

                  <div class="form-group">
								<h5>Matière<span class="text-danger">*</span></h5>

								<div class="controls">
									<select  name="subject_id[]" id="select" required  class="form-control">
										<option  value="">Selectionner une matière</option>
										 @foreach($subject as $key=> $subjects)
										<option  value="{{$subjects->id}}">{{$subjects->name}}</option>
										 @endforeach
									</select>
								 
								</div>
							</div> 
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<h5>Full Mark<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="full_mark[]" class="form-control" required>
								 
									 </div> 
									  
							</div>
							 
							</div>
							<div class="col-md-2">
							<div class="form-group">
								<h5>Pass Mark<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="pass_mark[]" class="form-control" required>
								 
									 </div> 
									  
							</div>
							 
							</div>
							<div class="col-md-2">
							<div class="form-group">
								<h5>Subjective Mark<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="subjective_mark[]" class="form-control" required>
								 
									 </div> 
									  
							</div>
							 
							</div>
								 <div class="col-md-2" style="padding-top: 25px;">
								<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
							    <span class="btn btn-da btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
							</div>
							
							</div>

  				
  			</div>
  			
  		</div>
  		
  	</div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		var counter = 0;
  		$(document).on("click",".addeventmore",function(){
  			var whole_extra_item_add = $('#whole_extra_item_add ').html();
  			$(this).closest(".add_item").append(whole_extra_item_add);
  			counter++;

  		});
  		$(document).on("click",".removeeventmore",function(event){
  	
  			$(this).closest(".delete_whole_extra_item_add").remove();
  			counter--;

  		});

  	});



  </script>
@endsection