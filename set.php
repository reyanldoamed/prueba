<?php
if(isset($_POST['submit'])) {
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

$ci = $_POST['ci'];
$pat = $_POST['pat'];
$mat = $_POST['mat'];
$nom = $_POST['nom'];


$sql = "UPDATE estudiante SET ci ='$ci', paterno ='$pat', materno ='$mat' WHERE ci = '$ci'";

if ($conexion->query($sql) === TRUE) {
header("location:examination_cpanel.php");

} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
}
?>