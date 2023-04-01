<div class="home-container">
    <h4 class="titulo-home">Cuentas Bancarias</h4>
    <div class="linea-divisora-home"></div>

    <div class="container">

    <?php
        $conn = conectar();
        $sql = 'SELECT * FROM "Cuenta_Bancaria" WHERE "id_cuentahabiente" = '.$_SESSION['id_cliente'];
        $stmt = oci_parse($conn, $sql);
        $q = oci_execute($stmt);

        if($q) {
            if ($obj = oci_fetch_object($stmt)) {
                do {

                    if ($obj->id_tipo_cuenta == 1) {
                        $tipoCuenta = "Ahorros";
                    } else {
                        $tipoCuenta = "Monetaria";
                    }
    ?>

                    <div class="card-container-cuentas">
                        <div class="card" style="padding:20px; border-radius:1rem">
                            <p class="numero-cuenta"><b>No. de Cuenta: </b><?= $obj->no_cuenta ?></p>
                            <p class="tipo-cuenta"><b>Tipo de Cuenta: </b><?= $tipoCuenta ?></p>
                            <p class="saldo-disponible"><b>Saldo de Cuenta: <span class="monto">Q.<?= $obj->saldo ?></span></b></p>
                            <a href="?p=historial-mes&no_cuenta=<?= $obj->no_cuenta ?>" class="historial-mes"><b>Ver Estado de Cuenta (Movimientos)</b></a>
                        </div>
                    </div>
    <?php
                } while ($obj = oci_fetch_object($stmt));
            } else {
                echo "<p>No se encontraron Cuentas Bancarias</p>";
            }
        } else {
            oci_free_statement($stmt);
        }
    ?>

          
    </div>
</div>
