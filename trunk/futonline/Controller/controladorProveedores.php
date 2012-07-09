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

class proveedores {
    
    public function proveedores(){
        $this->gestionaProveedores();
    }
    public function gestionaProveedores(){
        session_write_close();
        require_once '../Model/gestionaProveedores.php';

        $model= new gestionaProveedores();
        $modelo=$model->listarProveedores();
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["proveedores"]=$modelo;
            
            header("Location: ../View/Pages/vistaProveedores.php"); 


        
    }
}

?>

<?php
 
        new proveedores();
        
?>