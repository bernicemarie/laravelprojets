
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
        @if(Auth::user()->role=='Admin')
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
		  @endif
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
         @if(Auth::user()->role=='Admin')
        <li class="treeview {{($prefix =='/Gestion')?'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Ajout d'élements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('eleve.classe.view')}}"><i class="ti-more"></i>Liste des classes</a></li>
            <li><a href="{{route('eleve.age.view')}}">><i class="ti-more"></i>Liste des ages</a></li>
            <li><a href="{{route('eleve.groupe.view')}}">><i class="ti-more"></i>Liste des groupes</a></li>
            <li><a href="{{route('eleve.shift.view')}}">><i class="ti-more"></i>Liste des Shift</a></li>
            <li><a href="{{route('eleve.fee.view')}}">><i class="ti-more"></i> Fee Category</a></li>
            <li><a href="{{route('eleve.amount.view')}}">><i class="ti-more"></i> Fee Category Amount</a></li>
            <li><a href="{{route('eleve.exam.view')}}">><i class="ti-more"></i>Examen</a></li>
            <li><a href="{{route('eleve.subject.view')}}">><i class="ti-more"></i>Matières</a></li>
            <li><a href="{{route('eleve.assign.view')}}">><i class="ti-more"></i>Attribution des matières</a></li>
            <li><a href="{{route('eleve.designation.view')}}">><i class="ti-more"></i>Désignation</a></li>
             
          </ul>
        </li>
		@endif
         
		 
        <li class="header nav-small-cap">Gestion des élèves</li>
		  
        <li class="treeview {{($prefix =='/Enregistrement')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Gestion des élèves</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('registration.view')}}"><i class="ti-more"></i>Enregistrement</a></li>
            <li><a href="{{route('roll.view')}}"><i class="ti-more"></i>Générateur de roll</a></li>
            <li><a href="{{route('fee.view')}}"><i class="ti-more"></i>Montant à Payer</a></li>
            <li><a href="{{route('monthly.fee.view')}}"><i class="ti-more"></i>Payement Mensuel</a></li>
            <li><a href="{{route('exam.fee.view')}}"><i class="ti-more"></i>Examen</a></li>
             
          </ul>
        </li>
         <li class="treeview {{($prefix =='/employees')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Gestion des employés</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('employee.registration.view')}}"><i class="ti-more"></i>Ajouter un employé</a></li>
            <li><a href="{{route('employee.salary.view')}}"><i class="ti-more"></i>Salaire employé</a></li>
            
             
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