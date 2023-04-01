<?php
if(isset($send)) {
    $correo = htmlspecialchars($_POST['correo']);
    $contra = htmlspecialchars($_POST['contra']);

    $conn = conectar();
    $sql = 'SELECT * FROM "Cuentahabiente" WHERE "correo" = \''.$correo.'\' AND "contra" = \''.$contra.'\''; 
    $stmt = oci_parse($conn, $sql);
    $q = oci_execute($stmt);

    if( $obj = oci_fetch_object($stmt)) {
      if(oci_num_rows($stmt)>0){
        $_SESSION['id_cliente'] = $obj->id_cuentahabiente;
        redir("?p=login");
      }
    } else{
      alert("Los datos no son validos",0,'login');
    }

}

if (isset($_SESSION['id_cliente'])) {
	redir("?p=home");
} else {

?>

<div class="login-container">
        <div class="login-image-container">
          <img src="images/login-image-2.jpg" alt="Login Image" class="login-image">
        </div>
  
        <div class="login-form-container">

          <div class="login-content-container">
            <h4 class="titulo-login"><i class="fas fa-key"></i> Iniciar Sesión</h4>
            <div class="row">
              <form class="col s12" method="POST">
                
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" type="email" class="validate #e8eaf6 indigo lighten-5" name="correo">
                    <label for="email">Correo</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" type="password" class="validate #e8eaf6 indigo lighten-5" name="contra">
                    <label for="password">Contraseña</label>
                  </div>
                </div>
                
                <div class="login-button-container">
                  <button class="btn waves-effect waves-light #303f9f indigo darken-2" type="submit" name="send" style="display: flex; align-items: center;">
                    <i class="fas fa-sign-in-alt"></i>&nbsp;
                    Iniciar Sesión
                  </button>
                </div>
                
              </form>   
            </div>
          </div> 
            
        </div>
</div>

<?php
}
?>