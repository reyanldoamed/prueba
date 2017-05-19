<?php
        session_start();
        $conexion = mysql_connect("localhost","root","");
        mysql_select_db("evaluacion",$conexion);

        
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    background-color:#4169E1;
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
    background-color: #6495ED;
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

.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}

</style>
<body style="background-color:#FAFAD2;">
<div style="background-color:#00CED1; font-weight: bold; color:white;">
<section>
<p style="font-size:30px;">REGISTRAR AL ESTUDIANTE
<img style="float:right" src="Images/indice.png" width="90" class="img-circle"></p>

<?php 
  include_once 'menuh.php';
?>

</section>
</div>
<div class="container">

<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table width="90%" border="0">
  <tr>
    <td>
      <strong>Agregar Archivo de Excel [preguntas]</strong>
      
      <input type="file" name="archivo" id="archivo">
      <strong>Desea Actualizar la BD</strong>
      <label><input type="radio" name="radio" value="s" checked />SI</label>
      <label><input type="radio" name="radio" value="n" />NO</label>
      
<input type="submit" name="button" class="btn" id="button" value="Actualizar Base de Datos">
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
    if(isset($_POST['radio'])){
        //subir la imagen del articulo
        $nameEXCEL = $_FILES['archivo']['name'];
        $tmpEXCEL = $_FILES['archivo']['tmp_name'];
        $extEXCEL = pathinfo($nameEXCEL);
        $urlnueva = "xls/preguntashistoria.xls";          
        if(is_uploaded_file($tmpEXCEL)){
            copy($tmpEXCEL,$urlnueva);  
            echo '<div align="center"><strong>Datos Actualizados con Exito</strong></div>';
        }
        
    }
?>

 

<table border="1" width="100%">
    <thead>
        <tr>
            
        </tr>
        <tr>
        
            
        </tr>
    </thead>
    <tbody>
  <?php
 

        if(isset($_POST['radio'])){
            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
            
            $objPHPExcel = PHPExcel_IOFactory::load('xls/preguntashistoria.xls');
            $objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true);
            foreach ($objHoja as $iIndice=>$objCelda) {
    
                        echo '
                            
                        ';
                                                
                                                                             $op2=$objCelda['C'];
                $pregunta=$objCelda['A'];                                    $op3=$objCelda['D'];
                                                                              $op4=$objCelda['E'];

                                                             $respuesta=$objCelda['F'];
                $op1=$objCelda['B'];          
                    
                                    
                if($_POST['radio']=='s'){
                    $sql="INSERT INTO preguntas
                    (id_p, id_ma, pregunta, op1, op2, op3, op4, respuesta) 
                        VALUES ('','1','$pregunta','$op1','$op2','$op3', '$op4','$respuesta')";
                        mysql_query($sql);
                }
                    }
            }
    ?>
    
    </tbody>
</table>
</div>

</html>