<!DOCTYPE html>
<html>
<title>Sistema del Examen de Entrada | Login de Estudiantes</title>
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

body {
	background-image: url("Images/");
}
</style>
<body style="background-color:;">
<div style="background-color:#FFA07A; font-weight: bold; color:white;">
<section>
<p style="font-size:30px;">Sistema de Examenes Estudiantes UATF</p>		
</section>
</div>
<div class="container">
  <div class="imgcontainer">
   <img src="Images/indice.png" width="200" class="img-circle" >
  </div>
  <?php
  //error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit'])) {

include 'database_config2.php';

$conexion = new mysqli(SERVER,USER,PASS,BD);

$ci = $_POST['ci'];
$paterno = $_POST['pat'];
$materno = $_POST['mat'];
$nombres = $_POST['nom'];


$query = "SELECT * FROM estudiante WHERE ci='$ci' and paterno='$paterno' and materno='$materno' and nombres='$nombres'";
$result = $conexion->query($query);
$count = $result->num_rows;
$conexion->close();
	
	
if($count==1){
$seconds = 5 + time();
setcookie(loggedin, date("F jS - g:i a"), $seconds);
session_start();
$_SESSION['ci'] = $ci;
$_SESSION['pat'] = $paterno;
$_SESSION['mat'] = $materno;
$_SESSION['nom'] = $nombres;
header("location:inicioe.php");
}else{
 print '
<div class="alert alert-warning">
  <p><strong> Error !</strong> Account not found in Database</p>
</div>
';

}
}

  
  ?>
  
<form action="index.php" method="POST">
 

  <label><b style="color:white">C.I.</b></label>
    <input type="text"  placeholder="Ingrese su Cedula Identidad" name="ci" required>
        
  
    <label><b style="color:white">A. Paterno</b></label>
    <input type="text" placeholder="Ingrese su Apeliido Paterno" name="pat" required>

    <label><b style="color:white">A. Materno</b></label>
    <input type="text"  placeholder="Ingrese su Apellido Materno" name="mat" required>

    <label><b style="color:white">Nombres</b></label>
    <input type="text"  placeholder="Ingrese sus Nombres" name="nom" required>
        



    <button type="submit" name="submit" class="btn btn-info">Ingresar</button>
     

</form>
<form action="admin.php">
<button type="submit" class="btn btn-warning">Entrar como Administrador</button>
</form>


  </div>
<center>


</html>

