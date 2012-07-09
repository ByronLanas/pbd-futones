<?php
session_start();
if (!isset($_SESSION["usuario"])){
    
    ?><body>
<script type="text/javascript">
window.location="/futonline/View/Pages/vistaInicio.php";
</script>
</body><?php
    
    }else {echo 'ola';}
 $usuario=$_SESSION["usuario"];

?><?php

class nombre {

    public function nombre() {
        $this->mostrar_nombre();
    }

    public function mostrar_nombre() {
        session_write_close();
        require_once '../Model/muestraPedidoCanceladoAE.php';
        $model = new muestraPedidoCanceladoAE();
        $modelo = $model->consultar_pedidoCanceladoAE();
        $_SESSION["pedidos"] = $modelo;
        session_write_close();
        header("Location: ../View/Pages/vistaPedidoCanceladoAE.php");
       // require '../View/Pages/vistaPedido.php';
    }

}

?>
<?php
$nom = new nombre();
?>
