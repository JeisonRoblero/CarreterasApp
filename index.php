<?php
include "configs/config.php";
include "configs/funciones.php";

if(!isset($p)) {
  $p = "login";
} else {
  $p = $p;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Banco Virtual</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/a3c0bc2905.js" crossorigin="anonymous"></script>

    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Alertas -->
    <script src="http://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <header>
        <nav class="indigo darken-4" style="padding-left: 10px;">
            <div class="nav-wrapper">
              <a href="./" class="brand-logo" style="display: flex; align-items: center;"><img src="images/logo.png" width="40" alt="Logo Bando" style="margin-right: 5px;"> 
                Banco Virtual
              </a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Horarios</a></li>
                <li><a href="badges.html">Citas</a></li>
                <?php
                  if (isset($_SESSION['id_cliente'])) {
                ?>
                <li><a href="?p=logout"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
                <?php
                  } else {
                ?>
                <li><a href="collapsible.html">Acerca de</a></li>
                <?php
                  }
                ?>
              </ul>
            </div>
        </nav>
    </header>

    <main>

      <?php
        if(file_exists("modulos/".$p.".php")) {
          include "modulos/".$p.".php";
        } else {
          echo "<i>La página no ha sido encontrada <b>".$p."</b>, intenta reescribir el enlace ;) <a href='./'>Regresar</a></i>"; 
        }

      ?>

    </main>

    <footer class="page-footer indigo darken-4">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Banco Virtual</h5>
              <p class="grey-text text-lighten-4">Banca en linea dedicada al gestionamiento financiero de recursos monetarios.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Enlaces</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">WhatsApp</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Telegram</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2023 Copyright
          <a class="grey-text text-lighten-4 right" href="#!">Más enlaces</a>
          </div>
        </div>
    </footer>
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>