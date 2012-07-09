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
        $this->mostrar_producto();
    }

    public function mostrar_producto() {
        session_write_close();
        require_once '../Model/muestraProducto.php';
        $model = new muestraProducto();
        $modelo = $model->consultar_producto();
        $_SESSION["productos"] = $modelo;
       session_write_close();
        header("Location: ../View/Pages/productosDeTipo.php");
       // require '../View/Pages/vistaPedido.php';
    }

}

?>
<?php

$nom = new nombre();
?>