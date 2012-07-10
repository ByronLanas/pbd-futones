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

class clientesM {
    
    public function clientesM(){
        $this->gestionaClientesM();
    }
    public function gestionaClientesM(){
        session_write_close();
        require_once '../Model/muestraClientes.php';

        $model= new gestionaClientes();
        $modelo=$model->modificarClientes($_REQUEST["CLI_RUT"],$_REQUEST["CLI_NOM"], $_REQUEST["CLI_TEL"], $_REQUEST["CLI_MAIL"],$_REQUEST["CLI_DIR"]);
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["clientes"]=$modelo;
            
            header("Location: /futonline/View/Pages/vistaClientes.php"); 


        
    }
}

?>

<?php
 
        $cli= new clientesM();
        
?>