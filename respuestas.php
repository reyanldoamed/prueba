<?php
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);
session_start();
$ci = $_SESSION['ci'];

 
?>
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
    background-color:#08851b;
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
    background-color: #4CAF50;
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
    width: 80%; /* Full-width */

    border: 2px solid  #1dcaff; /* Add a grey border */
    font-size: 16px; /* Increase font-size */
	background-color: #F2F2F2;
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
    background-color: #F2F5A9;
}

table, td, th {
    border: 1px solid #00aced;
    text-align: left;
}

img {
	width:16px;
}
</style>
<body style="background-color:#FAFAD2;">
<div style="background-color:#FFA07A; font-weight: bold; color:white;">
<section>
<p style="font-size:30px;">Sistema de Examen de Admision UATF
</section>
</div>


<?php
/*error_reporting(E_ALL ^ E_DEPRECATED);
include 'database_config5.php';*/

$q11=$_REQUEST['q11'];
   
   $sql = "SELECT * FROM preguntas where id_p = $q11";
   $retval = $conexion->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
 while($row = $retval->fetch_array()) {
   $qu1 = $row['pregunta'];
   $answer1 = $row['respuesta'];
 }

 $q12=$_REQUEST['q12'];
  
   $sql = "SELECT * FROM preguntas where id_p = $q12";
   
   $retval = $conexion->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
 while($row = $retval->fetch_array()) {
   $qu2 = $row['pregunta'];
   $answer2 = $row['respuesta'];
 }

 $q13=$_REQUEST['q13'];
 
  $sql = "SELECT * FROM preguntas where id_p = $q13";
   
   $retval = $conexion->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
 while($row = $retval->fetch_array()) {
   $qu3 = $row['pregunta'];
   $answer3 = $row['respuesta'];
 }
  
  $q14 = $_REQUEST['q14'];
   $sql = "SELECT * FROM preguntas where id_p = $q14";
  
   $retval = $conexion->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
 while($row = $retval->fetch_array()) {
   $qu4 = $row['pregunta'];
   $answer4 = $row['respuesta'];
 }

  $q15 = $_REQUEST['q15'];
   $sql = "SELECT * FROM preguntas where id_p = $q15";
   
   $retval = $conexion->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
 while($row = $retval->fetch_array()) {
   $qu5= $row['pregunta'];
   $answer5 = $row['respuesta'];
 }
  
 
  $q1 =  $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 =  $_POST['q3'];
  $q4 =  $_POST['q4'];
  $q5 =  $_POST['q5'];
 
  
if ($q1 == $answer1) {
    $mark1 = 1;
	$check1 = "<img src="."'images/correct.png'"."/>"; 
} else {
   $mark1 = 0;
   $check1 = "<img src="."'images/wrong.png'"."/>"; 
}

if ($q2 == $answer2) {
    $mark2 = 1;
	$check2 = "<img src="."'images/correct.png'"."/>"; 
} else {
   $mark2 = 0;
   $check2 = "<img src="."'images/wrong.png'"."/>"; 
}

if ($q3 == $answer3) {
    $mark3 = 1;
	$check3 = "<img src="."'images/correct.png'"."/>"; 
} else {
   $mark3 = 0;
   $check3 = "<img src="."'images/wrong.png'"."/>"; 
}

if ($q4 == $answer4) {
    $mark4 = 1;
	$check4 = "<img src="."'images/correct.png'"."/>"; 
} else {
   $mark4 = 0;
   $check4 = "<img src="."'images/wrong.png'"."/>"; 
}

if ($q5 == $answer5) {
    $mark5 = 1;
	$check5 = "<img src="."'images/correct.png'"."/>"; 
} else {
   $mark5 = 0;
   $check5 = "<img src="."'images/wrong.png'"."/>"; 
}



$score = $mark1 + $mark2 + $mark3 + $mark4 + $mark5;

print '<h3 align ="center">ESTOS SON LOS RESULTADOS</h3>';

echo<<<EOT
 <br><table  id="myTable" width = "100%"  border="0" align ="center">
 <tr class="header">
 <th>PREGUNTAS DEL EXAMEN </th><th>TU RESPUESTA</th><th>RESULTADOS</th><th>  RESPUESTA CORRECTA</th>
 </tr>
 <tr>
 <td>$qu1</td><td>$q1</td><td>$check1</td><td>$answer1</td>
 </tr>
  <tr>
 <td>$qu2</td><td>$q2</td><td>$check2</td><td>$answer2</td>
 </tr>
  <tr>
 <td>$qu3</td><td>$q3</td><td>$check3</td><td>$answer3</td>
 </tr>
  <tr>
 <td>$qu4</td><td>$q4</td><td>$check4</td><td>$answer4</td>
 </tr>
  <tr>
 <td>$qu5</td><td>$q5</td><td>$check5</td><td>$answer5</td>
 </tr>
  <tr>
 
 </table>
EOT;

echo<<<EOT

<div class="alert alert-info">
  <strong>Informacion</strong> Tus respuestas correctas son <b>$score</b>  de <b>5 preguntas realizadas</b> 
</div>
EOT;




  ?>
  <br>
  <center>

</center>
 <li style="float:right"><a style="text-decoration:none;" class="active" href="inicioe.php">Salir</a></li>