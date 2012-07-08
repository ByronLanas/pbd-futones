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

class cuentas {
    
    public function cuentas(){
        $this->gestionaCuentas();
    }
    public function gestionaCuentas(){
        session_write_close();
        require_once '../Model/muestraCuentas.php';

        $model= new gestionaCuentas();
        $modelo=$model->listarCuentas();
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["cuentas"]=$modelo;
            
            header("Location: ../View/Pages/vistaCuentas.php"); 


        
    }
}

?>

<?php
 
        $cli= new cuentas();
        
?>