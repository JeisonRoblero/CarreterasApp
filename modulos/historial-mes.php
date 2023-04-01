<div class="historial-cuenta-container">
    <h4 class="titulo-historial">Estado de Cuenta - Cuenta no. <?= $_GET['no_cuenta'] ?></h4>
    <div class="linea-divisora-home"></div><br>
    <?php
        $conn = conectar();
        $sql = 'SELECT * FROM "Cuenta_Bancaria" WHERE "no_cuenta" = \''.$_GET['no_cuenta'].'\'';
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
    <div class="container">
        <p class="numero-cuenta-histo"><b>No. de Cuenta: </b><?= $obj->no_cuenta ?></p>
        <p class="tipo-cuenta-histo"><b>Tipo de Cuenta: </b><?= $tipoCuenta ?></p>
        <p class="saldo-disponible-histo"><b>Saldo de Cuenta: <span class="monto2">Q.<?= $obj->saldo ?></span></b></p>
        <a href="?p=transaccion&no_cuenta=<?= $obj->no_cuenta ?>" class="waves-effect waves-light btn right">Realizar Transacción</a>
    </div>

    <div class="container">

        <table class="striped">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>No. Transaccion</th>
                <th>Descripcion</th>
                <th>Estado Transaccion</th>
                <th>Cuenta Origen</th>
                <th>Cuenta Destino</th>
                <th>Tipo Transaccion</th>
                <th>Monto</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $sql2 = 'SELECT * FROM "Transaccion" WHERE "id_cuenta_origen" = '.$obj->no_cuenta.'ORDER BY "id_transaccion" DESC';
                $stmt2 = oci_parse($conn, $sql2);
                $q2 = oci_execute($stmt2);

                if($q2) {
                    if ($obj2 = oci_fetch_object($stmt2)) {
                        do {

                            if ($obj2->id_tipo_transaccion == 1) {
                                $tipoTr = "Débito";
                                $signo = "-";
                            } elseif ($obj2->id_tipo_transaccion == 2) {
                                $tipoTr = "Crédito";
                                $signo = "+";
                            } 

                            switch ($obj2->id_estado) {
                                case 1:
                                    $estadoTr = "Inicio";
                                    break;
                                case 2:
                                    $estadoTr = "En proceso";
                                    break;
                                case 3:
                                    $estadoTr = "Finalizado";
                                    break;
                                case 4:
                                    $estadoTr = "Bloqueado";
                                    break;
                                    
                            }
            ?>
                                <tr>
                                    <td><?= $obj2->fecha ?></td>
                                    <td><?= $obj2->id_transaccion ?></td>
                                    <td><?= $obj2->descripcion ?></td>
                                    <td><?= $estadoTr ?></td>
                                    <td><?= $obj2->id_cuenta_origen ?></td>
                                    <td><?= $obj2->id_cuenta_destino ?></td>
                                    <td><?= $tipoTr ?></td>
                                    <td><?= $signo ?>Q.<?= $obj2->monto ?></td>
                                </tr>
            <?php
                        } while ($obj2 = oci_fetch_object($stmt2));
                    } else {
                        echo "<p>No hay transacciones aún</p>";
                    }
                } else {
                    oci_free_statement($stmt2);
                }
            ?>
            
            </tbody>
        </table>


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