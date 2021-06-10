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
				  <h3 class="box-title">Les details</h3>
                  <a href="{{route('assign.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Ajouter une note</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><strong>Classe: </strong>{{$alldata['0']['class_group']['name']}}</h4>
					
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead class="thead-light">
							<tr>
                                <th width=3%>N°</th>
								<th >Matière</th>
								<th width=3%>Full Mark</th>
								<th width=3%>Pass Mark</th>
								<th width=3%>Subjective</th>
							</tr>
						</thead>
						<tbody>
							 @foreach($alldata as $key=>$details)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$details['school_subject']['name']}}</td>
								<td>{{$details->full_mark}}</td>
								<td>{{$details->pass_mark}}</td>
								<td>{{$details->subjective_mark}}</td>
								 
							 
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