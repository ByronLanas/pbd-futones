<?php
session_start();


if (!isset($_SESSION["usuario"])){
    
    ?><body>
<script type="text/javascript">
window.location="/futonline/View/Pages/vistaInicio.php";
</script>
</body><?php
    
    }
 $usuario=$_SESSION["usuario"];

?><?php

class nombre {

    public function nombre() {
        $this->mostrar_nombre();
    }

    public function mostrar_nombre() {
        session_write_close();
        require_once '../Model/muestraPedidoIngresadoAE.php';
        $model = new muestraPedidoIngresadoAE();
        $modelo = $model->consultar_pedidoIngresadoAE();
        $_SESSION["pedidos"] = $modelo;
        session_write_close();
        header("Location: ../View/Pages/vistaPedidoIngresadoAE.php");
       // require '../View/Pages/vistaPedido.php';
    }

}

?>
<?php

$nom = new nombre();
?>