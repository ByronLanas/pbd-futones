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

class Producto {

    public function Producto() {
        $this->ingresaProducto();
    }

    public function ingresaProducto() {
        session_write_close();
        $usuario = $_SESSION["usuario"];
        $nom_prod = $_REQUEST["nombre"];
        $prec_prod = $_REQUEST['precio'];
        $desc_prod = $_REQUEST['descripcion'];
        $tipo_prod = $_REQUEST['tipo'];
        $foto_prod = $_REQUEST['foto'];
        $tiem_prod = $_REQUEST['tiempo'];
        require_once '../Model/ingresaProducto.php';

        $model = new ingresaProducto();
        $modelo = $model->ingresarProducto($nom_prod, $prec_prod, $desc_prod, $tip_prod, $foto_prod, $tiem_prod);

        //aqui hay q modificar una ves se implementen los permisos

        header("Location: ../View/Pages/vistaIngresarProducto.php");
    }

}
?>

<?php
session_write_close();

$cli = new Producto($nom_prod, $prec_prod, $desc_prod, $tipo_prod, $foto_prod, $tiem_prod);
require '../View/Pages/vistaIngresarProducto.php';
?>