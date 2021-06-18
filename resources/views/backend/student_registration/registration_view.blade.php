@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	<!-- 	<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div> -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-12">
				<div class="box bl-3 border-primary">
				  <div class="box-header">
					<h4 class="box-title">Elève <strong>Recherche</strong></h4>
				  </div>

				  <div class="box-body">
				  	<form method="GET" action="{{route('registration.recherche')}}">
				  		<div class="row">
				  			<div class="col-md-3">
								 <div class="form-group">
								<h5>Classe<span class="text-danger"></span></h5>
								<div class="controls">
									<select name="class_id" id="select" required class="form-control">
										<option value="">Selectionner un rôle</option>
										 @foreach($classedata as $key=> $classe)
										<option  value="{{$classe->id}}" {{(@$classe->id==$class_id? "selected":" ")}}>{{$classe->name}}</option>
										 @endforeach
										 
										 
									</select>
								</div>
							    </div> 
						     </div>
						     <div class="col-md-3">
								 <div class="form-group">
								<h5>Year<span class="text-danger"></span></h5>
								<div class="controls">
									<select name="year_id" id="select" required class="form-control">
										<option value="">Selectionner une année</option>
										 @foreach($yeardata as $key=> $value)
										<option  value="{{$value->id}}" {{(@$value->id==$year_id? "selected":" ")}}>{{$value->name}}</option>
										 @endforeach
										 
									</select>
								</div>
							    </div> 
						     </div>
						     <div class="col-md-3" style="padding-top:25px;">
								  <input type="submit" class="btn btn-rounded btn-info mb-5" name="search" value="Recherche">
						     </div>
				  		</div>
				  		
				  	</form>
					 
				  </div>
				</div>
				</div>
			 
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">La liste des élèves</h3>
                  <a href="{{route('registration.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Ajouter un éléve</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						@if(!@search)
					  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
                                <th width=3%>N°</th>
								<th >Nom</th>
								<th >Roll</th>
								<th >Classe</th>
								<th >Année</th>
								<th >Image</th>
								@if(Auth::user()->role=='Admin')
								<th >Code</th>
								
								 
								<th width=3%>Actions</th>
								@endif
							</tr>
						</thead>
						<tbody>
							 @foreach($alldata as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value['registration_relation_user']['name']}}</td>
								<td></td>
							 
								<td>{{$value['registration_relation_classe']['name']}}</td>
								<td>{{$value['registration_relation_year']['name']}}</td>
								
								
								<td> <img  src="{{(!empty($value['registration_relation_user']['image']))? url('upload_image/student_image/'.$value['registration_relation_user']['image']):url('upload_image/bernice.jpg') }}" style="width: 80px; height: 75px; border: 1px solid #000000"></td>
								@if(Auth::user()->role=='Admin')
								<td>{{$value['registration_relation_user']['code']}}</td>
								<td>
                                    <a href="{{route('registration.edit',$value->student_id)}}" class="btn btn-info" id="edit">Editer</a>
                                    <a href="{{route('registration.delete',$value->id)}}" class="btn btn-danger" id="delete">Supprimer</a>
                                </td>
                                @endif
								
							</tr>
							 @endforeach
						</tbody>
						 
					  </table>
					  @else

					   <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
                                <th width=3%>N°</th>
								<th >Nom</th>
								<th >Roll</th>
								<th >Classe</th>
								<th >Année</th>
								<th >Image</th>
								@if(Auth::user()->role=='Admin')
								<th >Code</th>
								
								 
								<th width=3%>Actions</th>
								@endif
							</tr>
						</thead>
						<tbody>
							 @foreach($alldata as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value['registration_relation_user']['name']}}</td>
								<td></td>
							 
								<td>{{$value['registration_relation_classe']['name']}}</td>
								<td>{{$value['registration_relation_year']['name']}}</td>
								
								
								<td> <img  src="{{(!empty($value['registration_relation_user']['image']))? url('upload_image/student_image/'.$value['registration_relation_user']['image']):url('upload_image/bernice.jpg') }}" style="width: 80px; height: 75px; border: 1px solid #000000"></td>
								@if(Auth::user()->role=='Admin')
								<td>{{$value['registration_relation_user']['code']}}</td>
								<td>
                                    <a href="{{route('registration.edit',$value->student_id)}}" class="btn btn-info" id="edit">Editer</a>
                                    <a href="{{route('registration.delete',$value->id)}}" class="btn btn-danger" id="delete">Supprimer</a>
                                </td>
                                @endif
								
							</tr>
							 @endforeach
						</tbody>
						 
					  </table>
					  @endif
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
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