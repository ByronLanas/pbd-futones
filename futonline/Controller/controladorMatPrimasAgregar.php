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

class matPrimasA {
    
    public function matPrimasA(){
        $this->gestionaMatPrimasA();
    }
    public function gestionaMatPrimasA(){
        session_write_close();
        require_once '../Model/gestionaMatPrimas.php';

        $model= new gestionaMatPrimas();
        $modelo=$model->agregarMatPrimas( $_REQUEST["TIP_MAT"],$_REQUEST["CANT_MAT"],$_REQUEST["CANT_MIN_MAT"],$_REQUEST["CAL_ALG"], $_REQUEST["LAR_CIE"], $_REQUEST["ANC_CIE"], $_REQUEST["COL_CIE"], $_REQUEST["DEN_ESP"], $_REQUEST["GRO_ESP"], $_REQUEST["HIL_COL"], $_REQUEST["HIL_ESP"], $_REQUEST["LAR_MAD"], $_REQUEST["ANC_MAD"], $_REQUEST["ALT_MAD"], $_REQUEST["ANC_TEL"], $_REQUEST["MAT_TEL"], $_REQUEST["COL_COL"],$_REQUEST["CANT_COL"],$_REQUEST["TIP_MAD"]);
        
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
 
        $cli= new matPrimasA();
        
?>