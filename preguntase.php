<?php
include 'database_config2.php';
$conexion = new mysqli(SERVER,USER,PASS,BD);

session_start();
$ci = $_SESSION['ci'];


   
   $sql = "SELECT * FROM estudiante WHERE ci = '$ci'";
   $retval = $conexion->query($sql);
   
   
 while($row = $retval->fetch_array())
   $estado = $row['estado'];
   
   if ($estado == "COMPLETE") {
header("location:iexamen.php");
   } else {
   
   }


$sql = ("UPDATE estudiante SET estado = 'COMPLETE' WHERE ci ='$ci'");
       
if ($conexion->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();

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
<script type="text/javascript">

  function carga(){
    contador_s=60;
    contador_m =29;
    s =document.getElementById("segundos");
    m =document.getElementById("minutos");

    tiempo = setInterval(function(){
      if(contador_s==0)
      {
        contador_s=60;
        contador_m--;
        m.innerHTML= contador_m + ":";
        if(contador_m==-1)
        {
          s.innerHTML="00";
          m.innerHTML="00";
          alert("!!!!!!!!!!!!!Finalizo la prueba¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡");
          location.href="http://localhost:8080/UATF%20SISTEMA%20ADMISION/index.php"
          clearInterval(tiempo);
        }else{
          if(contador_m < 10)
          {
            contador_m = "0"+contador_m;
          }
        }
      }
      else{ 
        if (contador_s < 10 ) 
        {
            contador_s = "0"+contador_s;
            //s.innerHTML = contador_s;
           // contador_s--;
        }
        s.innerHTML = contador_s;
        contador_s--;
      }
      

    },1000);
  }
</script>
<title>Entry Exam System | Assessment</title>
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
#tempo{
  position: fixed;
  
 
}
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
    width: 100%; /* Full-width */
    border: 2px solid  #1dcaff; /* Add a grey border */
    font-size: 16px; /* Increase font-size */
	background-color: #c0deed;
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 6px; /* Add padding */
}

tr {
 Add a bottom border to all table rows */
    border-bottom: 1px solid #00aced; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #9AC0CD;
}

table {
	  font-size: 20px; 
	  width: 100%;
      border: 2px solid  #1dcaff; 
      background-color: #F2F2F2;
}
</style>
<body style="background-color:#FAFAD2;" onload="carga();">

 
  <div style="background-color:#FFA07A; font-weight: bold; color:white; position: relative;">
      <section >
          <p align="center" style="font-size:30px;">PREGUNTAS DE LA MATERIA DE HISTORIA
         <span id="segundos" style="float: right; ">60</span><span id="minutos" style="float: right;">29:</span></p>
      </section>
  </div>
  <div class="container">

        <?php
              //error_reporting(E_ALL ^ E_DEPRECATED);
              $conexion = new mysqli(SERVER,USER,PASS,BD);
              $sql = "select * from preguntas  ORDER BY rand()";
              $retval = $conexion->query($sql);
              while($row = $retval->fetch_array()) {
                  $q11 = $row['id_p'];
                  $q1 = $row['pregunta'];
                  $op11 = $row['op1'];
                  $op21 = $row['op2'];
                  $op31 = $row['op3'];
                  $op41 = $row['op4'];
              }
          
              $sql = "select * from preguntas where id_p!=$q11 ORDER BY rand()";
              $retval = $conexion->query($sql);
              while($row = $retval->fetch_array()){
                  $q12 = $row['id_p'];
                  $q2 = $row['pregunta'];
                  $op12 = $row['op1'];
                  $op22 = $row['op2'];
                  $op32 = $row['op3'];
                  $op42 = $row['op4'];  
              } 
         
              $sql = "select * from preguntas where id_p!=$q12 and id_p!=$q11  ORDER BY rand()";
              $retval = $conexion->query($sql);
              while($row = $retval->fetch_array()) {
                  $q13 = $row['id_p'];
                  $q3 = $row['pregunta'];
                  $op13 = $row['op1'];
                  $op23 = $row['op2'];
                  $op33 = $row['op3'];
                  $op43 = $row['op4'];
              }
          
              $sql = "select * from preguntas where id_p!=$q13 and id_p!=$q12 and id_p!=$q11  ORDER BY rand()";
              $retval = $conexion->query($sql);
              while($row = $retval->fetch_array()){
                  $q14 = $row['id_p'];
                  $q4 = $row['pregunta'];
                  $op14 = $row['op1'];
                  $op24 = $row['op2'];
                  $op34 = $row['op3'];
                  $op44 = $row['op4'];
              } 

              $sql = "select * from  preguntas where id_p!=$q14 and id_p!=$q13  and id_p!=$q12 and id_p!=$q11 ORDER BY rand()";
              $retval = $conexion->query($sql); 
              while($row = $retval->fetch_array()) {
                  $q15 = $row['id_p'];
                  $q5 = $row['pregunta'];
                  $op15 = $row['op1'];
                  $op25 = $row['op2'];
                  $op35 = $row['op3'];
                  $op45 = $row['op4'];
              }
          
           
        ?>

        <form action="respuestas.php" method="POST">
        <table>
        <!--pregunta uno-->
              <tr>
                  <td>1. <?php echo "$q1"; ?></td>
                  <input type="hidden"  id="q11" name="q11" value="<?php echo $q11;?>">
              </tr>
              <tr>
              </tr>
                  <td><input type="radio" value="<?php echo "$op11"; ?>" name="q1" required="required"</td> <?php echo "$op11"; ?> </td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op21"; ?>" name="q1" required="required"</td> <?php echo "$op21"; ?> </td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op31"; ?>" name="q1" required="required"</td> <?php echo "$op31"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op41"; ?>" name="q1" required="required"</td> <?php echo "$op41"; ?></td>
              </tr>
              <!--pregunta dos-->
              <tr>
                  <td>2. <?php echo "$q2"; ?></td>
              </tr>
              <input type="hidden"  id="q12" name="q12" value="<?php echo $q12;?>">
              <td><input type="radio" value="<?php echo "$op12"; ?>" name="q2" required="required"</td> <?php echo "$op12"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op22"; ?>" name="q2" required="required"</td> <?php echo "$op22"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op32"; ?>" name="q2" required="required"</td> <?php echo "$op32"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op42"; ?>" name="q2" required="required"</td> <?php echo "$op42"; ?></td>
              </tr>
              <!--pregunta tres-->
              <tr>
                  <td>3. <?php echo "$q3"; ?></td>
              </tr>
              <input type="hidden"  id="q13" name="q13" value="<?php echo $q13;?>">
              <td><input type="radio" value="<?php echo "$op13"; ?>" name="q3" required="required"</td> <?php echo "$op13"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op23"; ?>" name="q3" required="required"</td> <?php echo "$op23"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op33"; ?>" name="q3" required="required"</td> <?php echo "$op33"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op43"; ?>" name="q3" required="required"</td> <?php echo "$op43"; ?></td>
              </tr>
              <!--pregunta cuatro-->
              <tr>
                  <td>4. <?php echo "$q4"; ?></td>
              </tr>
              <input type="hidden"  id="q14" name="q14" value="<?php echo $q14;?>">
              <td><input type="radio" value="<?php echo "$op14"; ?>" name="q4" required="required"</td> <?php echo "$op14"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op24"; ?>" name="q4" required="required"</td> <?php echo "$op24"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op34"; ?>" name="q4" required="required"</td> <?php echo "$op34"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op44"; ?>" name="q4" required="required"</td> <?php echo "$op44"; ?></td>
              </tr>
              <!--pregunta cinco-->
              <tr>
                <td>5. <?php echo "$q5"; ?></td>
              </tr>
              <input type="hidden"  id="q15" name="q15" value="<?php echo $q15;?>">
                  <td><input type="radio" value="<?php echo "$op15"; ?>" name="q5" required="required"</td> <?php echo "$op15"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op25"; ?>" name="q5" required="required"</td> <?php echo "$op25"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op35"; ?>" name="q5" required="required"</td> <?php echo "$op35"; ?></td>
              <tr>
                  <td><input type="radio" value="<?php echo "$op45"; ?>" name="q5" required="required"</td> <?php echo "$op45"; ?></td>
              </tr>
              <td>  <button type="submit" name = "submit" class="btn btn-warning" onclick="return confirm('ESTA SEGURO DE TERMINAR EL EXAMEN?');" >TERMINAR EXAMEN</button></td>
  </div>
</html>

<script>
function myFunction() {

  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

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


  
  
</html>


