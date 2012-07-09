<?php
session_start();


if (!isset($_SESSION["usuario"])) {
    ?><body>
        <script type="text/javascript">
            window.location="/futonline/View/Pages/vistaInicio.php";
        </script>
    </body><?php
}
?><?php
$pedidos = $_SESSION["pedidos"];
?>
<body style="background-color:#0A8A9A; font: Helvetica 12pt;"> <span style="color:white;"><b><font size=6pt>Listado de pedidos Despachados.</font></b></span> <br><br>
    <div> <a href ="../../Controller/controladorPedidoIngresadoAE.php" style="color: white;">Ingresados</a>
        <b> <a href ="../../Controller/controladorPedidoDespachadoAE.php" style="color: white;" > Despachados</a></b>
        <a href ="../../Controller/controladorPedidoTerminadoAE.php" style="color: white;"> Terminados</a>
        <a href ="../../Controller/controladorPedidoCanceladoAE.php" style="color: white;"> Cancelados</a>
    </div>    
    <br>
<?php
if (isset($pedidos)) {
    ?>
        <table BGCOLOR ="#FFFFFF" border="1">
            <tr>
                <td width =75><div align="center">Estado</div></td>
                <td><div align="center">Cliente</div></td>
                <td><div align="center">Fecha de Ingreso</div></td>
                <td><div align="center">Monto Total</div></td>
                <td><div align="center">Tiempo Produccion</div></td>
                <td><div align="center">Detalle</div></td>
            </tr>
    <?php
    foreach ($pedidos as $pedido) {
        ?>
                <tr>
                    <td><div align="center"><?php echo $pedido['EST_PED'] ?></div></td>
                    <td><div align="center"><?php echo $pedido['CLI_NOM'] ?></div></td>
                    <td><div align="center"><?php echo $pedido['FEC_PED'] ?></div></td>
                    <td><div align="center"><?php echo $pedido['MONT_PED'] ?></div></td>
                    <td><div align="center"><?php echo $pedido['TIEM_PED'] ?></div></td>
                    <td><div align="center"><a href="../../Controller/controladorDetalle.php?id='<?php echo $pedido['COD_PED']?>'">Mostrar</a></div>

    <?php } ?>
        </table>
                    <?php } else { ?> <table border ="1" style="color: white">
        <tr><td>No hay pedidos despachados para mostrar</td></tr></table>
    

        <?php
    }
    ?>
