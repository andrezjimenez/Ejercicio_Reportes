<?php
	include "../Classes/conexion.php";
	include "../Classes/responserate.php";

$objConexion = new conexion();
$conexion = $objConexion->conectar();


$objCategoria = new responserate();
 $respuesta=$objCategoria->registrarclienteges($conexion, $_POST['nombre']);

?>
<!DOCTYPE html>
<!-- saved from url=(0050)https://getbootstrap.com/docs/4.1/examples/cover/# -->
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">
    <title>Registro Cliente</title>
  </head>
  <body class="text-center">



      <main role="main" class="inner cover">
        
        <p class="lead">
            <h3 class="cover-heading"><?php echo $respuesta;?></h3><br>
            <button type="button" class="btn btn-primary btn-sm" onclick = "location='../registroclientelocal.php'" > Volver </button>
        </p>
      </main>


    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Cover Template for Bootstrap_files/jquery-3.3.1.slim.min.js.descarga" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Cover Template for Bootstrap_files/popper.min.js.descarga"></script>
    <script src="./Cover Template for Bootstrap_files/bootstrap.min.js.descarga"></script>
  </body>
</html>