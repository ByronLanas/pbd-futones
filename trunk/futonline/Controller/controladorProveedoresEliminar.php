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

class ProveedoresE {
    
    public function ProveedoresE(){
        $this->gestionaProveedores();
    }
    public function gestionaProveedores(){
        session_write_close();
        require_once '../Model/gestionaProveedores.php';

        $model= new gestionaProveedores();
        $rut=$_REQUEST["RUT_PROV"];
        

            $modelo=$model->eliminarProveedores($rut);


                $modelo=$model->listarProveedores();

        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["proveedores"]=$modelo;
            
            session_write_close();
            require '../View/Pages/vistaProveedores.php';
            //header("Location: ../View/Pages/vistaCuentas.php"); 


        
    }
}

?>

<?php
 
        $cli= new ProveedoresE();
        
?>