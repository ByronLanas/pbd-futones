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
class cancelar {

    public function cancelar() {
        $this->cancelar_pedido();
    }

    public function cancelar_pedido() {
        if(!isset($_REQUEST["id_pedido"])){ return 0;}
        $id_pedido=$_REQUEST["id_pedido"];
        foreach($id_pedido as $pedido){
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
require 'controladorPedidoIngresado.php'
?>