<?php
session_start();


if (!isset($_SESSION["usuario"])) {
    ?>
    <body>
        <script type="text/javascript">
            window.location="/futonline/View/Pages/vistaInicio.php";
        </script>
    </body><?php
}
$nombre = $_SESSION["nombre"];
$pedidos = $_SESSION["pedidos"]
?>

<body style="background-color:#0A8A9A; font: Helvetica 12pt;"> <span style="color:white;"><b> Pedidos del cliente: <?php echo $nombre; ?></b></span> <br><br>
    <div> <b> <a href ="../../Controller/controladorPedidoIngresado.php" style="color: white;">Ingresados</a></b>
        <a href ="../../Controller/controladorPedidoDespachado.php" style="color: white;" > Despachados</a>
        <a href ="../../Controller/controladorPedidoTerminado.php" style="color: white;"> Terminados</a>
        <a href ="../../Controller/controladorPedidoCancelado.php" style="color: white;"> Cancelados</a>
    </div>    
    <br>
    <?php
    if (isset($pedidos)) {
        ?>
        <form name="borrar" id="borrar" action="/futonline/Controller/controladorBorrarProducto.php" method="POST">
            <table BGCOLOR ="#FFFFFF" border="1">
                <tr>
                    <td width =75><div align="center">Estado</div></td>
                    <td><div align="center">Fecha de Ingreso</div></td>
                    <td><div align="center">Monto Total</div></td>
                    <td><div align="center">Tiempo Produccion</div></td>
                    <td><div align="center">Detalle</div></td>
                    <td><div align="center">Cancelar Pedido</div></td>
                </tr>
                <?php
                foreach ($pedidos as $pedido) {
                    ?>
                    <tr>
                        <td><div align="center"><?php echo $pedido['EST_PED'] ?></div></td>
                        <td><div align="center"><?php echo $pedido['FEC_PED'] ?></div></td>
                        <td><div align="center"><?php echo $pedido['MONT_PED'] ?></div></td>
                        <td><div align="center"><?php echo $pedido['TIEM_PED'] ?></div></td>
                        <td><div align="center"><a href="/futonline/Controller/controladorDetalle.php?id=<?php echo $pedido['COD_PED'] ?>">Mostrar </a>
                            </div></td>
                        <td><div align="center"><input type="checkbox" name="id_pedido[]" id ="id_pedido" value="<?php echo $pedido['COD_PED'] ?>"/></div>
                        <?php } ?>
                <tr><td colspan="6">
                        <input type="submit" value="Cancelar pedidos" onclick="return show_confirm()"/>
                </tr></td>
            </table></form>
    <?php } else { ?> <table border ="1" style="color: white;">
            <tr><td>No hay pedidos ingresados para mostrar</td></tr></table>


        <?php
    }
    ?>