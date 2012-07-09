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
$nombre = $_SESSION["nombre"];
$detalles = $_SESSION["detalles"]
?>
<body style="background-color:#0A8A9A; font: Helvetica 12pt;"> <span style="color:white;"><b> Detalle del pedido N°: <?php echo $detalles['0']['COD_PED']; ?></b></span> <br><br>

    <br>
    <?php
    if (isset($detalles)) {
        ?>
        <table BGCOLOR ="#FFFFFF" border="1">
            <tr>
                <td width =75><div align="center">Nombre Producto</div></td>
                <td><div align="center">Precio</div></td>
                <td><div align="center">Cantidad</div></td>
                <td><div align="center">Foto</div></td>
                <td><div align="center">Descripcion</div></td>
                <td><div align="center">Tipo</div></td>
            </tr>
            <?php
            foreach ($detalles as $detalle) {
                ?>
                <tr>
                    <td><div align="center"><?php echo $detalle['NOM_PROD'] ?></div></td>
                    <td><div align="center"><?php echo $detalle['PREC_PROD'] ?></div></td>
                    <td><div align="center"><?php echo $detalle['CANT_DET'] ?></div></td>
                    <td><div align="center"><?php echo $detalle['FOTO_PROD'] ?></div></td>
                    <td><div align="center" style="max-width: 700px;"><?php echo $detalle['DESC_PROD'] ?></div></td>
                    <td><div align="center"><?php echo $detalle['TIP_PROD'] ?></div></td>

                <?php } ?>

        </table>
    <?php } ?>






