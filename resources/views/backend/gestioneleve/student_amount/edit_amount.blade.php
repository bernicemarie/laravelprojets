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
			  <h4 class="box-title">Ajouter un montant</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('amount.update',$amountData[0]->fee_category_id)}}">
						@csrf
					  <div class="row">
						<div class="col-12">						
							 <div class="add_item">
							 	
		                  @foreach($amountData as $edit)
		                  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
							 
							
								 <div class="form-group">
								<h5>Classe<span class="text-danger">*</span></h5>

								<div class="controls">
									<select name="class_id[]"  id="select" required class="form-control">
										<option value="">Selectionner une classe</option>
										 @foreach($classes as  $classe)
										<option  value="{{$classe->id}}"{{($edit->class_id==$classe->id)? "selected":""}}>{{$classe->name}}</option>
										 @endforeach
									</select>
								</div>
							</div> 
							
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
								<h5>Categorie <span class="text-danger">*</span></h5>

								<div class="controls">
									<select name="fee_category_id"  id="select" required class="form-control">
										<option value="">Selectionner une categorie</option>
										 @foreach($fee_categories as $key=> $feecategory)
										<option value="{{$feecategory->id}}"{{($amountData['0']->fee_category_id == $feecategory->id?"selected":"")}}>{{$feecategory->name}}</option>
										
										 @endforeach
									</select>
								</div>
							
							</div>
								</div>

								<div class="col-md-5">
									<div class="form-group">
								<h5>Amount<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="amount[]" value="{{($edit->amount)}}" class="form-control">
								 
									 </div> 
									  
							</div>
								</div>
								
								 <div class="col-md-2" style="padding-top: 25px;">
								<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
								<span class="btn btn-da btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>

							
							 
							</div>
							</div>
                        
						</div>
						 @endforeach
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
  			<div class="col-md-5">

                  <div class="form-group">
								<h5>Classe<span class="text-danger">*</span></h5>

								<div class="controls">
									<select  name="class_id[]" id="select" required class="form-control">
										<option  value="">Selectionner une classe</option>
										 @foreach($classes as $key=> $classe)
										<option  value="{{$classe->id}}">{{$classe->name}}</option>
										 @endforeach
									</select>
								</div>
							</div> 
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<h5>Amount<span class="text-danger">*</span></h5>
								<div class="controls">
								<input  type="text" name="amount[]" class="form-control">
								@error('name')
								<span class="text-danger">{{$message}}</span>

								@enderror
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