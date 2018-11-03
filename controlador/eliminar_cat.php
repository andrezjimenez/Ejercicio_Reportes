<?php
include "../clases/conexion.php";
include "../clases/categoria.php";

$objConexion = new conexion();
$conexion = $objConexion->conectar();


$objCategoria = new categoria();
$respuesta=$objCategoria->Eliminar($conexion, $_GET['id']);

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
    <title>Eliminar Categoria</title>
    <!-- Bootstrap core CSS -->
    <link href="../Cover Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../Cover Template for Bootstrap_files/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">          
          <img src="../Imagenes/crud.PNG"><br>
         
        </div>
      </header>

      <main role="main" class="inner cover">
        
        <p class="lead">
            <h3 class="cover-heading"><?php echo $respuesta?></h3><br>
            <button type="button" class="btn btn-primary btn-sm" onclick = "location='../Mostrar_cat.php'" > Volver </button>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.<br>Modificado por: Brayan Jimenez </p>
        </div>
      </footer>
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