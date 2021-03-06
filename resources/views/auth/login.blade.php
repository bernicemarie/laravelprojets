<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=" {{asset('backend/images/favicon.ico')}}">

    <title>Ecole - Mama Thérèse </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	<!-- Style-->  
	<link rel="stylesheet" href=" {{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href=" {{asset('backend/css/skin_color.css')}}">	

</head>
<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">Bienvenue chez Mama Thérèse</h2>
							<p class="text-white-50">Connectez vous pour ouvrir votre session</p>							
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
                       @endif
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
					             <input autofocus="email" required  name="email" type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Votre compte">
							
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
									<input required  name="password" type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Votre mot de pass">

									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" >
										<label for="basic_checkbox_1">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
                                     @if (Route::has('password.request'))
                    <a class="underline text-sm  text-danger text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Mot de pass oublié') }}</span>
                    </a>
                                    @endif

                
										 
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">Connectez-Vous</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>														

							<div class="text-center text-white">
							  <p class="mt-20">- Connectez-vous avec -</p>
							  <p class="gap-items-2 mb-20">
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
								</p>	
							</div>
							
							<div class="text-center">
								<p class="mt-15 mb-0 text-white">Vous n'avez pas de compte? <a href="{{route('register')}}" class="text-danger ml-5">Créez votre compte</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src=" {{asset('backend/js/vendors.min.js')}}"></script>
    <script src=" {{asset('backend/../assets/icons/feather-icons/feather.min.js')}}"></script>	

</body>
</html>
