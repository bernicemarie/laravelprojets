@extends('admin.admin_master')
@section('admin')



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employé Sortant</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

 <form method="post" action="{{ route('store.employee.leave') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

   <div class="row">



<div class="col-md-6">

    <div class="form-group">
	<h5>Employee Name <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="employee_id" required="" class="form-control">
			<option value="" selected="" disabled="">Selectionner un nom</option>
			 
			 @foreach($employees as $employee)
			<option value="{{ $employee->id }}">{{ $employee->name }}</option>
			 @endforeach
		</select>
	 </div>
          </div>


   	</div> <!-- // end col md-6 -->



   	<div class="col-md-6">

    <div class="form-group">
		<h5>Date début <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="start_date" class="form-control" > 
	  </div>
		 
	</div>


   	</div> <!-- // end col md-6 -->





   	<div class="col-md-6">

   <div class="form-group">
	<h5>Raison départ<span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control">
			<option value="" selected="" disabled="">Select Employee Name</option>
			 
			 @foreach($leave_purpose as $leave)
			<option value="{{ $leave->id }}">{{ $leave->name }}</option>
			 @endforeach
			 <option value="0">Nouveau Sujet</option>
		</select>
		<br>
<input type="text" name="name" id="add_another" class="form-control" placeholder="Ajouter un autre sujet" style="display: none;">		
	 </div>
          </div>


   	</div> <!-- // end col md-6 -->


   		<div class="col-md-6">

   	 <div class="form-group">
		<h5>Date Fin  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="end_date" class="form-control" > 
	  </div>
		 
	</div>
   		
   	</div> <!-- // end col md-6 -->
   	
   </div> <!-- // end row -->

	 
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Enregistrer">
	 <input type="reset" class="btn btn-rounded btn-danger mb-5" value="Annuler">
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


 
 
	  
	  </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','#leave_purpose_id',function(){
			var leave_purpose_id = $(this).val();
			if (leave_purpose_id == '0') {
				$('#add_another').show();
			}else{
				$('#add_another').hide();
			}
		});
	});
</script>



@endsection
