<?php
if(isset($_POST['submit'])) {

include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

$quid = $_POST['qid'];
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$answer  = $_POST['answer'];

$sql = "UPDATE preguntas SET pregunta = '$question', op1 ='$option1', op2 ='$option2', op3 ='$option3', respuesta ='$answer' WHERE id_p = '$quid'";

if ($conexion->query($sql) === TRUE) {
header("location:exam.php");

} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
}
?>