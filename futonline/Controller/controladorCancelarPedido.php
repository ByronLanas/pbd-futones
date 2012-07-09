<?php
session_start();


if (!isset($_SESSION["usuario"])) {
    ?><body>
        <script type="text/javascript">
            window.location="/futonline/View/Pages/vistaInicio.php";
        </script>
    </body><?php
}
$usuario = $_SESSION["usuario"];
?>
<script language="JavaScript">
    alert("OLA");
</script>
<?php

class cancelar {

    public function cancelar() {
        $this->confirmar();
        $this->cancelar_pedido();
    }

    public function confirmar() {
        ?>
        <script language="JavaScript">
            alert("e");
        </script>
        <?php
    }

    public function cancelar_pedido() {
        if (!isset($_REQUEST["id_pedido"])) {
            return 0;
        }
        ?>

        <?php
        $id_pedido = $_REQUEST["id_pedido"];
        foreach ($id_pedido as $pedido) {
            require_once '../Model/cancelaPedido.php';
            $model = new cancelaPedido();
            $modelo = $model->cancelar_pedido($pedido);
        }
    }

}
?>

<?php
$cancelar = new cancelar();
//session_start();
session_write_close();
switch ($_SESSION['nivelPermiso']) {
    case 1:require 'controladorPedidoIngresado.php';
        break;
    default:require 'controladorPedidoIngresadoAE.php';
        break;
}
?>