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

class clientesE {
    
    public function clientesE(){
        $this->gestionaClientes();
    }
    public function gestionaClientes(){
        session_write_close();
        require_once '../Model/muestraClientes.php';

        $model= new gestionaClientes();
        $modelo=$model->eliminarClientes($_REQUEST["CLI_RUT"]);
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["clientes"]=$modelo;
            
            header("Location: ../View/Pages/vistaClientes.php"); 


        
    }
}

?>

<?php
 
        $cli= new clientesE();
        
?>