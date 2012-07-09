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

    public function nombre($id) {
        $this->mostrar_nombre($id);
    }

    public function mostrar_nombre($id) {
        session_write_close();
        require_once '../Model/muestraDetalle.php';
        $usuario = $_SESSION["usuario"];
        $model = new muestraDetalle();
        $modelo = $model->consultar_detalle($usuario,$id);
        $_SESSION["detalles"] = $modelo;
        session_write_close();
        header("Location: ../View/Pages/vistaDetalle.php");
       // require '../View/Pages/vistaPedido.php';
    }

}

?>
<?php
$id = $_GET['id'];
$nom = new nombre($id);
?>

