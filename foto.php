<?php

$op1=$_REQUEST["op1"]; 
$op2=$_REQUEST["op2"];
$op3=$_REQUEST["op3"];
$op4=$_REQUEST["op4"];
$respuesta=$_REQUEST["respuesta"];

$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);


$conexion=mysql_connect("localhost","root","")or die("error 1");
mysql_select_db("evaluacion",$conexion) or die("error 2");
$consulta="insert into preguntas(id_p, id_ma, pregunta, op1, op2, op3, op4, respuesta) 
                        VALUES ('','4','$destino','$op1','$op2','$op3', '$op4','$respuesta')";       
mysql_query($consulta,$conexion) or die("error 3");
mysql_close($conexion);
header("Location: exam.php");
?>

