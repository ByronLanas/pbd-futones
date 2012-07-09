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

class matPrimasM {
    
    public function matPrimasM(){
        $this->gestionaMatPrimasM();
    }
    public function gestionaMatPrimasM(){
        session_write_close();
        require_once '../Model/gestionaMatPrimas.php';

        $model= new gestionaMatPrimas();
        $modelo=$model->modificarMatPrimas($_REQUEST["ID_MAT"], $_REQUEST["TIP_MAT"], $_REQUEST["CANT_MAT"], $_REQUEST["COL_COL"],$_REQUEST["CANT_COL"]);
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["algodones"]=$modelo["algodones"];
            $_SESSION["telas"]=$modelo["telas"];
            $_SESSION["maderas"]=$modelo["maderas"];
            $_SESSION["hilos"]=$modelo["hilos"];
            $_SESSION["cierres"]=$modelo["cierres"];
            $_SESSION["espumas"]=$modelo["espumas"];
            
            header("Location: ../View/Pages/vistaMatPrimas.php"); 


        
    }
}

?>

<?php
 
        $cli= new matPrimasM();
        
?>