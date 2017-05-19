<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function delete_id
{
     if(confirm('Are you sure you want to drop all students ?'))
     {
        window.location.href='dropstudent.php';
     }
}
</script>
<title>Sistema del Examen de Entrada | Estudiantes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Styles/w3.css">
<link rel="stylesheet" href="Styles/w3-theme-teal.css">
<link rel="stylesheet" href="Styles/font-awesome.min.css">
<link rel="stylesheet" href="Styles/bootstrap.min.css" >
<link rel="icon" href="Images/icon.png">
<script src="JavaScripts/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
</head>
<style>
form {

}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

div2 {
    margin-bottom: 15px;
    padding: 4px 12px;
}

.danger {
    background-color: #ffdddd;
    border-left: 6px solid #f44336;
}

.success {
    background-color: #ddffdd;
    border-left: 6px solid #4CAF50;
}

.info {
    background-color: #e7f3fe;
    border-left: 6px solid #2196F3;
}


.warning {
    background-color: #ffffcc;
    border-left: 6px solid #ffeb3b;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:#6495ED;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: lightblue;
}

.active {
    background-color: #FF6347;
}

#myInput {
    background-image: url('Images/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 2px solid  #1dcaff; /* Add a grey border */
    font-size: 16px; /* Increase font-size */
	background-color: #E0FFFF;
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 6px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #00aced; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color:#87CEEB;
}

</style>
<body style="background-color:#FAFAD2;">
<div style="background-color:#00CED1; font-weight: bold; color:white;">
<section>
<p style="font-size:30px;">Sistema de Examen de Admision UATF
<img style="float:right" src="Images/indice.png" width="90" class="img-circle"></p>
<?php 
  include_once 'menu.php';
?>
</section>
</div>
<div class="container">
<center>
 <h3>Estudiantes registrados en el sistema</h3>
  </center>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="BUSCAR AL ESTUDIANTE">

<table id="myTable">
  <tr class="header">
    <th>Cedula Identidad</th>
    <th>A. Paterno </th>
	    <th>A. Materno</th>
		    <th>Nombres</th>
			    <th>Nota</th>
				 <th>Estado</th>
  </tr>
<?php
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

  $sql = "SELECT * FROM estudiante";
   $retval = $conexion->query($sql);
   
   
   while($row = $retval->fetch_array()) {

 echo "<tr><td>".$row['ci']."</td><td>".$row['paterno']."</td><td>".$row['materno']."</td><td>".$row['nombres']."</td><td>".$row['nota']."</td><td>".$row['estado'];
 echo '</td><td><a class="btn btn btn-info" href="editstudent.php?id='.$row['ci'].'">Modificar Datos</a>';
echo '</td><td><a class="btn btn-danger" href="deletestudent.php?id='.$row['ci'].'">Eliminar</a>';
   }
   
$conexion->close();   
?>
  </div>
  </tr>
  </table>
<center>

</html>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
