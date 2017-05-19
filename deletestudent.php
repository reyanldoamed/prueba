<?php
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

$id = $_GET['id'];


$sql = "DELETE FROM estudiante WHERE ci = '$id'";

if ($conexion->query($sql) === TRUE) {
header("location:principal.php");} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>