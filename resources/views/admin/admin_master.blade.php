<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title> Ecole - Mama Thérèse</title>
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
      <!-- header -->
      @include('admin.body.header')
   <!-- End  header -->
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.body.aside')
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  @yield('admin')
  <!-- /.content-wrapper -->
  <!-- footer -->
  @include('admin.body.footer')
  <!-- footer -->
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src=" {{asset('backend/js/vendors.min.js')}}"></script>
    <script src=" {{asset('backend/../assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src=" {{asset('backend/../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src=" {{asset('backend/../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src=" {{asset('backend/../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{asset('backend/../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('backend/js/pages/data-table.js')}}"></script>

  <script src="{{asset('backend/../assets/vendor_components/jquery-steps-master/build/jquery.steps.js')}}"></script>
    <script src="{{asset('backend/../assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('backend/../assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/steps.js')}}"></script>
	<!-- Sunny Admin App -->
	<script src=" {{asset('backend/js/template.js')}}"></script>
	<script src=" {{asset('backend/js/pages/dashboard.js')}}"></script>

 <!--  Nice confimation modal with sweethalet -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script type="text/javascript">
    $(function(){
      $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Etes-vous sûr?',
  text: "La suppression sera permanente!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Annuler',
  confirmButtonText: 'Oui, Suprimer!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href =link
    Swal.fire(
      'Suppression faite!',
      'La ligne a été supprimée.',
      'success'
    )
  }
})
      });
    });
  </script>
   <script type="text/javascript">
    $(function(){
      $(document).on('click','#edit',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Etes-vous sûr?',
  text: "La mise à jour!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Annuler',
  confirmButtonText: 'Oui, Editer!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href =link
     
  }
})
      });
    });
  </script>
   <!-- End  Nice confimation modal with sweethalet -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>



    
	
	
	
</body>
</html>
{{asset('backend/')}}