<!DOCTYPE html>
<html>
<title>Sistema del Examen de Entrada | Estudiantes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Styles/w3.css">
<link rel="stylesheet" href="Styles/w3-theme-teal.css">
<link rel="stylesheet" href="Styles/font-awesome.min.css">
<link rel="stylesheet" href="Styles/bootstrap.min.css" >
<link rel="icon" href="Images/icon.png">
<script src="JavaScripts/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

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
    background-color:#FF6347;
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
	background-color:#E0FFFF;
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
    background-color: #9AC0CD;
}

</style>
<body style="background-color:#FAFAD2;">
<div style="background-color:#00CED1; font-weight: bold; color:white;">
<section>
<p style="font-size:30px;">Sistema del Examen de Entrada
<img style="float:right" src="Images/icon.png" width="50"></p>
<ul>
  <li><a style="text-decoration:none;" href="examination_cpanel.php">Inicio</a></li>
  <li><a style="text-decoration:none;" href="exam.php">Ver Examen</a></li>
  <li><a style="text-decoration:none;" href="assignstudent.php">Registrar Estudiante</a></li>
  
  <li><a style="text-decoration:none;" href="lockexam.php">Cerrar Examen</a></li>
  <li><a style="text-decoration:none;" href="unlockexam.php">Abrir Examen</a></li>
  <li style="float:right"><a style="text-decoration:none;" class="active" href="logout.php">Salir</a></li>
</ul>	
</section>
</div>
<div class="container">

<?php
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

$id = $_GET['id'];

  $sql = "SELECT * FROM estudiante Where ci = '$id'";
   $retval = $conexion->query($sql);
  
   
   while($row = $retval->fetch_array()) {


$ci = $row['ci'];
$paterno = $row['paterno'];
$materno = $row['materno'];
$nombres = $row['nombres'];

   }
   
   
  $conexion->close();
?>

 <h3 align="center">Modificar Regsitros del Estudiante</h3>
 <form action="set.php" method="POST">
<table id="myTable" width="100%" cellpadding="5" cellspacing="3">
<tr>
<tr><th>Cedula Identidad:</th><td><input type="text" class="form-control" id="usr" name="ci" placeholder="Full Name"  value="<?php echo "$ci";?>"</td>
<th>A. Paterno</th><td><input type="text" class="form-control" id="usr" name="pat" placeholder="Gender"  value="<?php echo "$paterno";?>" required> </td>
</tr>
<tr>
<th>A. Materno </th><td><input type="text" class="form-control" id="usr" name="mat" placeholder="Username" value="<?php echo "$materno";?>" required></td>
<th>Nombres</th><td><input type="text" class="form-control" id="usr" name="nom" placeholder="Username" value="<?php echo "$nombres";?>" required></td>
</tr>
</table>
  <button type="submit" name="submit" class="btn btn-info">Actualizar Datos</button>

	<br><br>
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
