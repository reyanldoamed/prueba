<?php
session_start();
$ci = $_SESSION['ci'];
$paterno = $_SESSION['pat'];
$materno = $_SESSION['mat'];
$nombres = $_SESSION['nom'];
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
    <title>Entry Exam System | Student Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/w3.css">
    <link rel="stylesheet" href="Styles/w3-theme-teal.css">
    <link rel="stylesheet" href="Styles/font-awesome.min.css">
    <link rel="stylesheet" href="Styles/bootstrap.min.css" >
    <link rel="icon" href="Images/icon.png">
    <script src="JavaScripts/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estiloinicioe.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#FAFAD2;">
  <div class="total">
            <div style="background-color:#212F3C; font-weight: bold; color:white;">
                <section>
                    <p style="font-size:30px;">SISTEMA DE EXAMEN DE ADMISION UATF</p>
                    <ul>
                        <li><a style="text-decoration:none;" href="inicioe.php" ><span class="glyphicon glyphicon-user">  INICIO</span></a></li>
                        <li><a style="text-decoration:none;" href="iexamen.php"><span class="glyphicon glyphicon-list-alt">  INICIAR EXAMEN</span></a></li>
                        <li style="float:right"><a style="text-decoration:none;" class="active" href="logout.php"> <span class="glyphicon glyphicon-off">    Salir</span></a></li>
                    </ul>	
                </section>
            </div>
            <div class="">
                  <center>
                    <div class="">
                      <?php
                          //error_reporting(E_ALL ^ E_DEPRECATED);
                          include 'database_config2.php';
                          $conexion = new mysqli(SERVER,USER,PASS,BD);
                          $result = $conexion->query("SELECT * FROM estudiante WHERE ci = '$ci'");
                          while($row = $result->fetch_array())
                          {
                          //echo '<p><img class="img-circle" width="200" border="2" src="'.$row['profileurl'].'"></p>';
                          }
                      ?>
                    </div>
                  </center>
                  <img src="Images/user1.jpg"><br><br>
                  <table class="table table-hover">
                      <tr class="header">
                        <th>Cedula Identidad</th>
                        <th>APELLIDO PATERNO</th>
                    	  <th>APELLIDO MATERNO</th>
                    		<th>NOMBRES</th>		   
                      </tr>
                      <?php
                        $sql = "SELECT * FROM estudiante where ci = '$ci'";
                        $retval = $conexion->query($sql);   
                        while($row = $retval->fetch_array()) {
                            echo "<tr><td>".$row['ci']."</td><td>".$row['paterno']."</td><td>".$row['materno']."</td><td>".$row['nombres'];
                        } 
                        $conexion->close();  
                      ?>
                      <?php    
                        $conexion=mysql_connect("localhost","root","reynaldo123") or die("Problemas en la conexion");
                        mysql_select_db("evaluacion",$conexion) or die("Problemas en la seleccion de la base de datos");
                        $datos=mysql_query("SELECT * FROM estudiante where ci = '$ci'", $conexion) or die("Problemas en el select".mysql_error());
                        mysql_close($conexion);
                        ($perso=mysql_fetch_array($datos))   
                      ?>
                      <input type="hidden"  id="id" name="id" value="<?php echo $perso['nota'];?>"> 
                      <input type="hidden"  id="id" name="id" value="<?php echo $perso['estado'];?>"> 
                  </table>
          </div>
  </div>
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
