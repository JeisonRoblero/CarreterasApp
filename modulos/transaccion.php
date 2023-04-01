<?php
if(isset($send)) {
    $cuenta_origen = htmlspecialchars($_POST['cuenta_origen']);
    $cuenta_destino = htmlspecialchars($_POST['cuenta_destino']);
    $monto = htmlspecialchars($_POST['monto']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $tipoTr = 1;
    $conn = conectar();
    $sql = 'BEGIN PROC_TRANSACCION(:PARAM1,:PARAM2,:PARAM3,:PARAM4,:PARAM5); END;'; 
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':PARAM1', $descripcion);
    oci_bind_by_name($stmt, ':PARAM2', $monto);
    oci_bind_by_name($stmt, ':PARAM3', $cuenta_origen);
    oci_bind_by_name($stmt, ':PARAM4', $cuenta_destino);
    oci_bind_by_name($stmt, ':PARAM5', $tipoTr);
    $q = oci_execute($stmt);

    if($q == true) {
        alert("Transacción realizada con éxito",1,'home');
    } else{
      alert("Los datos no son validos",0,'transaccion&no_cuenta='.$_GET['no_cuenta']);
    }

}

?>

<div class="transaccion-form-container">
    <h4 class="titulo-transaccion">Transacción - Cuenta de origen: <?= $_GET['no_cuenta'] ?></h4>
    <div class="linea-divisora-home"></div><br><br>
    <div class="container">
        <div class="row">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?= $_GET['no_cuenta'] ?>" name="cuenta_origen" id="cuenta_origen" type="number" class="validate">
                        <label for="cuenta_origen">Cuenta Origen</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="No. Cuenta" name="cuenta_destino" id="cuenta_destino" type="number" class="validate">
                        <label for="cuenta_destino">Cuenta Destino</label>
                    </div>
                </div>
                <div class="row" style="display:flex;align-items:center">
                    <div class="input-field col s6">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Monto</span>
                                <p>El monto se tomará en quetzales guatemaltecos</p>
                            </div>
                        </div>
                    </div>

                    <div class="input-field col s6">
                        <input placeholder="Q." name="monto" id="monto" type="number" class="validate">
                        <label for="monto">Monto</label>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="descripcion" name="descripcion" type="text" class="validate">
                    <label for="descripcion">Descripción</label>
                    </div>
                </div>

                <div class="trans-container">
                    <button class="waves-effect waves-light btn trans-button #00acc1 cyan darken-1" name="send" style="font-size:1.2rem"><i class="fas fa-check"></i> Transferir</button>
                </div>
                

            </form>
        </div>

    </div>
</div>