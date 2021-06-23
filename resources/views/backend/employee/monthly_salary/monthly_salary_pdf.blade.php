<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
   <td><h2>
  <?php $image_path = '/upload_image/bernice.jpg'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>Groupe Scolaire Mama Thérèse</h2>
<p>Adresse</p>
<p>Phone : +224 622 791 979</p>
<p>Email : kamanobenjamin@gmail.com</p>
<p> <b> Situation employé</b> </p>

    </td> 
  </tr>
  
   
</table>

@php 
 
 $date = date('Y-m',strtotime($details['0']->date));
       if ($date !='') {
        $where[] = ['date','like',$date.'%'];
       }

$totalattend = App\Models\EmployeeAttendance::with(['relation_user'])->where($where)->where('employee_id',$details['0']->employee_id)->get();

        $salary = (float)$details['0']['relation_user']['salary'];
        $salaryperday = (float)$salary/30;
        $absentcount = count($totalattend->where('attend_status','Absent'));
        $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
        $totalsalary = (float)$salary-(float)$totalsalaryminus;
 
@endphp 

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Details</th>
    <th width="45%">Données</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Nom</b></td>
    <td>{{ $details['0']['relation_user']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Salaire de base</b></td>
    <td>{{ $details['0']['relation_user']['salary'] }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Total Absence pour ce mois</b></td>
    <td>{{ $absentcount }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Mois</b></td>
    <td>{{ date('M Y',strtotime($details['0']->date)) }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Salaire du mois</b></td>
    <td>{{ $totalsalary }}</td>
  </tr>
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%"> Details</th>
    <th width="45%">Données</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Nom</b></td>
    <td>{{ $details['0']['relation_user']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Salire de base</b></td>
    <td>{{ $details['0']['relation_user']['salary'] }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Total Absence pour ce  mois</b></td>
    <td>{{ $absentcount }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Mois</b></td>
    <td>{{ date('M Y',strtotime($details['0']->date)) }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Salaire du Mois</b></td>
    <td>{{ $totalsalary }}</td>
  </tr>
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Imprimer le : {{ date("d M Y") }}</i>

 

</body>
</html>
