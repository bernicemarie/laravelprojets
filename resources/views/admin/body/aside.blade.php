
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
            <li><a href="{{route('employee.leave.view')}}"><i class="ti-more"></i>Employé Sortant</a></li>
            <li><a href="{{route('employee.attendance.view')}}"><i class="ti-more"></i>Présence Employé</a></li>
            <li><a href="{{route('employee.monthly.salary')}}"><i class="ti-more"></i>Salaire Mensuel Employé</a></li>
            
             
          </ul>
        </li>
        <li class="treeview {{($prefix =='/marks')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Gestion des notes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route =='marks.entry.add')?'active':''}}"><a href="{{route('marks.entry.add')}}"><i class="ti-more"></i>Ajouter une note</a></li>
            <li class="{{($route =='marks.entry.edit')?'active':''}}"><a href="{{route('marks.entry.edit')}}"><i class="ti-more"></i>Editer une note</a></li>
             <li class="{{($route =='marks.entry.grade')?'active':''}}"><a href="{{route('marks.entry.grade')}}"><i class="ti-more"></i>Niveau</a></li>
            
            
             
          </ul>
        </li>
        <li class="treeview {{($prefix =='/accounts')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Gestion des comptes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route =='student.fee.view')?'active':''}}"><a href="{{route('student.fee.view')}}"><i class="ti-more"></i>Liste des comptes</a></li>
             <li class="{{($route =='account.salary.view')?'active':''}}"><a href="{{route('account.salary.view')}}"><i class="ti-more"></i>Salaire Employé</a></li>
              <li class="{{($route =='other.cost.view')?'active':''}}"><a href="{{route('other.cost.view')}}"><i class="ti-more"></i>Autres Prix</a></li>
             
            
            
             
          </ul>
        </li>
        <li class="treeview {{($prefix =='/reports')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Gestion des Rapports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route =='monthly.profit.view')?'active':''}}"><a href="{{route('monthly.profit.view')}}"><i class="ti-more"></i>Rapport Mensuel</a></li>
               <li class="{{($route =='marksheet.generate.view')?'active':''}}"><a href="{{route('marksheet.generate.view')}}"><i class="ti-more"></i>MarkSheet Elève</a></li>
              <li class="{{($route =='marksheet.generate.view')?'active':''}}"><a href="{{route('attendance.report.view')}}"><i class="ti-more"></i>Rapport Présence</a></li>
              <li class="{{($route =='student.result.view')?'active':''}}"><a href="{{route('student.result.view')}}"><i class="ti-more"></i>Résultat Elève</a></li>
              
             <li class="{{($route =='student.idcard.view')?'active':''}}"><a href="{{route('student.idcard.view')}}"><i class="ti-more"></i>Carte Elève</a></li>
              
            
            
             
          </ul>
        </li>
		<li>
          <a href="{{route('admin.logout')}}">
            <i data-feather="lock"></i>
			<span>Quitter l'application</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	 
  </aside>