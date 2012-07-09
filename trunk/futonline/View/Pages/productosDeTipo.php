<?php
session_start();


if (!isset($_SESSION["usuario"])) {
    ?><body>
        <script language="JavaScript">function ola(){var tip = document.getElementById("tipo").value;var strUser = e.options[e.selectedIndex].value; alert('asd') }</script>
        <script type="text/javascript">
            window.location="/futonline/View/Pages/vistaInicio.php";
        </script>
    </body><?php
}
$usuario = $_SESSION["usuario"];
?><?php
header('Content-Type: text/html;charset=utf-8');

$productos = $_SESSION["productos"];
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">

    <select id="tipo" onChange="location = this.options[this.selectedIndex].value;">
        <option value="/futonline/Controller/ControladorCatalogo.php?tipoProducto=futon" <?php if($_REQUEST['tipoProducto']=="futon"){echo "selected";} ?>>futon</option>
        <option value="/futonline/Controller/ControladorCatalogo.php?tipoProducto=pera" <?php if($_REQUEST['tipoProducto']=="pera"){echo "selected";} ?>>pera</option>
        <option value="/futonline/Controller/ControladorCatalogo.php?tipoProducto=puff" <?php if($_REQUEST['tipoProducto']=="puff"){echo "selected";} ?>>puff</option>
        <option value="/futonline/Controller/ControladorCatalogo.php?tipoProducto=cama" <?php if($_REQUEST['tipoProducto']=="cama"){echo "selected";} ?>>cama</option>
        <option value="/futonline/Controller/ControladorCatalogo.php?tipoProducto=cubre_futon" <?php if($_REQUEST['tipoProducto']=="cubre_futon"){echo "selected";} ?>>cubre futon</option>
        <option value="/futonline/Controller/ControladorCatalogo.php?tipoProducto=cojin" <?php if($_REQUEST['tipoProducto']=="cojin"){echo "selected";} ?>>cojines</option>
    </select>

<body style="background-color:#0A8A9A; font: Helvetica 12pt;">

    <table border="1">
        <thead>
            <tr>
                <th>codigo</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($productos))
                foreach ($productos as $producto) {
                    ?>
                    <tr>
                        <td><?php $tipoProducto ?></td>
                        <td><?php echo $producto['COD_PROD'] ?></td>
                        <td><?php echo $producto['NOM_PROD'] ?></td>
                        <td><?php echo $producto['DESC_PROD'] ?></td>
                        <td><?php echo $producto['PREC_PROD'] ?></td>
                    </tr>
    <?php }
?>
        </tbody>
    </table>


