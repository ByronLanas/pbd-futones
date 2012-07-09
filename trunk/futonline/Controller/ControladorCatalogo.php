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

class catalogo {
    
    public function catalogo(){
        $this->recibirCatalogo();
    }
    public function recibirCatalogo(){
        session_write_close();
        require_once '../Model/muestraProducto.php';
        $tipoProducto=$_REQUEST["tipoProducto"];
        if($tipoProducto=="cubre%20futon"){
            $tipoProducto='cubre futon';
        }

        $model= new muestraProducto();
        $modelo=$model->tipoProducto($tipoProducto);
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["productos"]=$modelo;
            
            header("Location: ../View/Pages/productosDeTipo.php?tipoProducto=$tipoProducto"); 
//require '../View/Pages/vistaMenuLogueado.php';

        
    }
}

?>

<?php
 
        $cat= new catalogo();
        
?>