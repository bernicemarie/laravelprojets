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
    <td><h2>Mama Thérèse</h2>
<p>Adresse</p>
<p>Phone : +224 622 791 979</p>
<p>Email : kamanobenjamin@gmail.com</p>
<p> <b> Situation Finaciére de l'élève</b> </p>

    </td> 
  </tr>
  
   
</table>



<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">registration_relation_user Details</th>
    <th width="45%">registration_relation_user Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>registration_relation_user Name</b></td>
    <td>{{ $details['registration_relation_user']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>registration_relation_user ID No</b></td>
    <td>{{ $details['registration_relation_user']['id_no'] }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>registration_relation_user Role</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Père</b></td>
    <td>{{ $details['registration_relation_user']['fname'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Mère</b></td>
    <td>{{ $details['registration_relation_user']['mname'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Téléphone</b></td>
    <td>{{ $details['registration_relation_user']['telephone'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Adresse</b></td>
    <td>{{ $details['registration_relation_user']['adresse'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Sexe</b></td>
    <td>{{ $details['registration_relation_user']['sexe'] }}</td>
  </tr>

    


    <tr>
    <td>9</td>
    <td><b>Date de naissance</b></td>
    <td>{{ $details['registration_relation_user']['dob'] }}</td>
  </tr>
    <tr>
    <td>10</td>
    <td><b>Discount </b></td>
    <td>{{ $details['registration_relation_discount']['discount'] }} %</td>
  </tr>
    <tr>
    <td>11</td>
    <td><b>Année</b></td>
    <td>{{ $details['registration_relation_user']['name'] }}</td>
  </tr>
    <tr>
    <td>12</td>
    <td><b>Classe  </b></td>
    <td>{{ $details['registration_relation_user']['name'] }}</td>
  </tr>
    <tr>
    <td>13</td>
    <td><b>Groupe </b></td>
    <td>{{ $details['registration_relation_groupe']['name'] }}</td>
  </tr>
    <tr>
    <td>14</td>
    <td><b>Shift </b></td>
    <td>{{ $details['registration_relation_shift']['name'] }}</td>
  </tr>
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Impression des données : {{ date("d M Y") }}</i>

</body>
</html>
