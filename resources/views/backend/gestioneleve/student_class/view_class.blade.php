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

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">La liste des classes</h3>
                  <a href="{{route('classe.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Ajouter une classe</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
                                <th width=3%>N°</th>
								<th >Nom</th>
								 
								<th width=3%>Actions</th>
							</tr>
						</thead>
						<tbody>
							 @foreach($alldata as $key=>$classe)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$classe->name}}</td>
								 
								<td>
                                    <a href="{{route('classe.edit',$classe->id)}}" class="btn btn-info" id="edit">Editer</a>
                                    <a href="{{route('classe.delete',$classe->id)}}" class="btn btn-danger" id="delete">Supprimer</a>
                                </td>
							</tr>
							 @endforeach
						</tbody>
						 
					  </table>
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