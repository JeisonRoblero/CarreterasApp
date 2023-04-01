<?php
  @session_start();
  @extract($_REQUEST);

  $host = 'localhost';
  $port = 1521;
  $sidName = 'orcl';
  $user = '"C##jroblerog2"';
  $pass = 'j12345';


// function conectar() {
//     $host = 'localhost';
//     $port = 1521;
//     $sidName = 'orcl';
//     $user = '"C##jroblerog2"';
//     $pass = 'j12345';
  
//     $bd_settings = "
//     (DESCRIPTION =
//         (ADDRESS = (PROTOCOL = TCP)(HOST = ".$host.")(PORT = ".$port."))
//         (CONNECT_DATA =
//           (SERVER = DEDICATED)
//           (SERVICE_NAME = ".$sidName.")
//         )
//       )
//     ";
  
//     try {
//       $bd = new PDO('oci:dbname='.$bd_settings, $user, $pass);
//       $bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
//       $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       echo 'Conexión exitosa';
//       return $bd;
//     } catch (Exception $e) {
//       echo "Error de conexión: ".$e->getMessage();
//     }
// }


?>


