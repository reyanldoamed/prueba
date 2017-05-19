<?php
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

$sql = "UPDATE estudiante set estado = 'COMPLETOS'";

if ($conexion->query($sql) === TRUE) {
header("location:principal.php");} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>