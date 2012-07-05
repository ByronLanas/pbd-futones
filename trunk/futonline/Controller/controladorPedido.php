<?php

class nombre {

    public function nombre() {
        $this->mostrar_nombre();
    }

    public function mostrar_nombre() {
        
        require_once '../Model/muestraPedido.php';
        session_start();
        $usuario = $_SESSION["usuario"];
        $model = new muestraPedido();
        $modelo = $model->consultar_pedido($usuario);
        $_SESSION["pedidos"] = $modelo;
        require '../View/Pages/vistaPedido.php';
    }

}

?>
<?php

$nom = new nombre();
?>