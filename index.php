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
<link rel="stylesheet" type="text/css" href="css/estiloindex.css">
<body >
  <div class="total" >
    <div style="background-color:#212F3C; font-weight: bold; color:white;">
          <section>
              <p style="font-size:30px;">Sistema de Examenes Estudiantes UATF</p>   
          </section>
      </div>
      <div class="">
          <div class="">
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
                    }else
                    {
                        print '
                        <div class="alert alert-warning">
                        <p><strong> Error !</strong> Account not found in Database</p>
                        </div>
                        ';
                    }
                }  
          ?>
          <form action="index.php" method="POST" class="form-horizontal">
              <div class="form-group">
                  <label class="control-label col-sm-2" for="email">C.I:</label>
                  <div class="col-sm-10">
                    <input type="text"  placeholder="Ingrese su Cedula Identidad" name="ci" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-2" for="email">A.PATERNO:</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Ingrese su Apeliido Paterno" name="pat" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-2" for="email">A.MATERNO:</label>
                  <div class="col-sm-10">
                    <input type="text"  placeholder="Ingrese su Apellido Materno" name="mat" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-2" for="email">NOMBRES:</label>
                  <div class="col-sm-10">
                    <input type="text"  placeholder="Ingrese sus Nombres" name="nom" required>
                  </div>
              </div>
              <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-info">Ingresar</button>
                  </div>
              </div>
          </form>
          <form action="admin.php" >
                <button type="submit" class="btn btn-info">Entrar como Administrador</button>
          </form>
      </div>
  </div>
</body>
</html>

