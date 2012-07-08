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

class clientesA {
    
    public function clientesA(){
        $this->gestionaClientesA();
    }
    public function gestionaClientesA(){
        session_write_close();
        require_once '../Model/muestraClientes.php';

        $model= new gestionaClientes();
        $modelo=$model->agregarClientes($_REQUEST["CLI_RUT"],$_REQUEST["CLI_NOM"],$_REQUEST["CLI_TEL"],$_REQUEST["CLI_MAIL"],$_REQUEST["CLI_DIR"]);
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["clientes"]=$modelo;
            
            header("Location: ../View/Pages/vistaClientes.php"); 


        
    }
}

?>

<?php
 
        $cli= new clientesA();
        
?>