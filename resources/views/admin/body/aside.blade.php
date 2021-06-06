
@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
      <a href="{{route('dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src=" {{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Ecole </b> Mama Thérèse</h3>
					 </div>
				</a>
			</div>
        </div>
      
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route =='dashboard')?'active':''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Tableau de bord</span>
          </a>
        </li>  
        <li class="treeview {{($prefix =='/utilisateurs')?'active':''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Administration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li><a href="{{route('user.view')}}"><i class="ti-more"></i>Liste utilisateurs</a></li>
            <li><a href="{{route('user.view')}}"><i class="ti-more"></i>Ajout utilisateur</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{($prefix =='/Profile')?'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Profile utilisateur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Votre Profile</a></li>
            <li><a href="{{route('password.view')}}">><i class="ti-more"></i>Modifier le mot de pass</a></li>
            <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
          </ul>
        </li>
		
         
		 
        <li class="header nav-small-cap">Interface Utilisateur</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
             
          </ul>
        </li>
		<li>
          <a href="{{route('admin.logout')}}">
            <i data-feather="lock"></i>
			<span>Quitter</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	 
  </aside>